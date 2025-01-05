import random
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time
import os
import requests
import uuid
from datetime import datetime
import urllib.parse

# Initialize Firefox WebDriver
driver = webdriver.Firefox()

# Define list of governorates
GOVERNORATES = ['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Mafraq', 'Karak', 
                'Maan', 'Ajloun', 'Balqa', 'Jerash', 'Tafilah', 'Madaba']

# Create images directory if it doesn't exist
IMAGES_DIR = 'airbnb_images'
if not os.path.exists(IMAGES_DIR):
    os.makedirs(IMAGES_DIR)

def download_image(image_url, listing_number, image_number):
    try:
        timestamp = int(time.time())
        unique_id = str(uuid.uuid4())[:8]
        extension = urllib.parse.urlparse(image_url).path.split('.')[-1]
        if extension.lower() not in ['jpg', 'jpeg', 'png', 'gif', 'webp']:
            extension = 'jpg'
            
        filename = f"{timestamp}_{unique_id}_listing{listing_number}_img{image_number}.{extension}"
        filepath = os.path.join(IMAGES_DIR, filename)
        
        response = requests.get(image_url, timeout=10)
        if response.status_code == 200:
            with open(filepath, 'wb') as f:
                f.write(response.content)
            return filename
        return None
    except Exception as e:
        print(f"Error downloading image: {e}")
        return None

try:
    url = "https://www.airbnb.com/s/jordan/homes?refinement_paths%5B%5D=%2Fhomes&flexible_trip_lengths%5B%5D=one_week&monthly_length=3&price_filter_input_type=0&channel=EXPLORE&date_picker_type=calendar&source=structured_search_input_header&search_type=filter_change&tab_id=home_tab&query=Amman%2C%20Jordan&disable_auto_translation=true&price_filter_num_nights=33"
    driver.get(url)

    WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.CSS_SELECTOR, '#site-content > div > div:nth-child(2) > div > div > div > div > div'))
    )
    time.sleep(10)

    parent_element = driver.find_element(By.CSS_SELECTOR, '#site-content > div > div:nth-child(2) > div > div > div > div > div')
    valid_children = [child for child in parent_element.find_elements(By.XPATH, './*')
                      if 'fqd7fl6 atm_da_cbdd7d dir dir-ltr' not in child.get_attribute('class')]

    listings_data = []
    image_id_counter = 1  # Counter for image IDs

    for child in valid_children:
        try:
            href = child.find_element(By.CSS_SELECTOR, 'div > div.c1l1h97y.atm_d2_1kqhmmj.dir.dir-ltr > div > div > div > div > a').get_attribute('href')
            if href:
                listings_data.append({
                    'href': href,
                    'images': []
                })
        except:
            continue

    for listing_index, listing in enumerate(listings_data, 1):
        driver.get(listing['href'])
        time.sleep(6)

        try:
            title = driver.find_element(By.CSS_SELECTOR, '#site-content > div > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div > div > div > div > div > section > div > div._t0tx82 > div > h1').text
        except:
            title = "Title not found"

        try:
            description = driver.find_element(By.CSS_SELECTOR, 
                "#site-content > div > div:nth-child(1) > div:nth-child(3) > div > div._16e70jgn > div > div:nth-child(4) > div > div:nth-child(2) > div > div > span > span").text
        except:
            description = "Description not found"

        # Download images
        downloaded_images = []
        try:
            images = driver.find_elements(By.TAG_NAME, "img")
            count = 0
            for img in images:
                src = img.get_attribute("src")
                if src and count < 5:
                    downloaded_filename = download_image(src, listing_index, count + 1)
                    if downloaded_filename:
                        downloaded_images.append(downloaded_filename)
                        count += 1
        except Exception as e:
            print(f"Error processing images: {e}")

        current_time = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        
        listing.update({
            'id': listing_index,
            'title': title.replace("'", "''"),
            'description': description.replace("'", "''"),
            'price': random.randint(10, 70),
            'status': 'active',
            'location': 'Jordan',
            'governorate': random.choice(GOVERNORATES),
            'owner_id': 1,
            'bed': random.randint(1, 5),
            'bath': random.randint(1, 5),
            'sqft': random.randint(100, 350),
            'is_deleted': "'0'",
            'created_at': current_time,
            'updated_at': current_time,
            'images': downloaded_images
        })

    # Write SQL insert statements
    with open('listings_insert.sql', 'w', encoding='utf-8') as file:
        # Write listings inserts
        for listing in listings_data:
            sql = f"""INSERT INTO `listings` 
                    (`id`, `title`, `description`, `price`, `status`, `location`, `governorate`, 
                    `owner_id`, `bed`, `bath`, `sqft`, `is_deleted`, `created_at`, `updated_at`) 
                    VALUES 
                    ({listing['id']}, '{listing['title']}', '{listing['description']}', {listing['price']}, 
                    '{listing['status']}', '{listing['location']}', '{listing['governorate']}', 
                    {listing['owner_id']}, {listing['bed']}, {listing['bath']}, {listing['sqft']}, 
                    {listing['is_deleted']}, '{listing['created_at']}', '{listing['updated_at']}');\n\n"""
            
            file.write(sql)
            
            # Write image inserts for this listing
            for img_index, img_filename in enumerate(listing['images']):
                is_main = "'1'" if img_index == 0 else "'0'"  # First image is main
                img_sql = f"""INSERT INTO `listing_images` 
                           (`id`, `listing_id`, `image_url`, `is_deleted`, `is_main`, `created_at`, `updated_at`) 
                           VALUES 
                           ({image_id_counter}, {listing['id']}, '{"http://127.0.0.1:8000/assets/properties/"+img_filename}', '0', {is_main}, 
                           '{listing['created_at']}', '{listing['updated_at']}');\n"""
                file.write(img_sql)
                image_id_counter += 1
            
            file.write("\n")

except Exception as e:
    print(f"Error: {e}")

finally:
    driver.quit()