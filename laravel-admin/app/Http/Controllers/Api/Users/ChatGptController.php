<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatGptController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
            'question' => 'required|string',
        ]);

        $userId = $request->userId;
        $question = $request->question;

        // Fetch user details
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Fetch favorite items
        $favorites = Favorite::where('user_id', $userId)
            ->where('is_deleted', '0')
            ->get();

        if ($favorites->isEmpty()) {
            return response()->json(['message' => 'No favorite items found.'], 404);
        }

        // Collect favorite item details with listing details
        $favoritesText = "";
        foreach ($favorites as $favorite) {
            // Get all data related to the listing
            $listing = Listing::find($favorite->listing_id);

            // Check if the listing exists
            if ($listing) {
                // Convert the listing's data to a readable string
                $listingDetails = "Properties Details:\n";
                foreach ($listing->toArray() as $key => $value) {
                    if ($key !== 'id') { // Skip the 'id' column
                        $listingDetails .= "  - " . ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
                    }
                }
            } else {
                $listingDetails = "Listing not found.\n";
            }
            

            // Append details for each favorite item
           
            $favoritesText .= $listingDetails;
            $favoritesText .= "-----------------------------\n";
        }

        // Compile the full content to send to the API
        $chatContent = "User Information:\n";
        $chatContent .= "  - Name: " . $user->name . "\n";
        $chatContent .= "  - Email: " . $user->email . "\n\n";
        $chatContent .= "  - phone: " . $user->	phone_number . "\n\n";
        $chatContent .= "Favorite Items:\n" . $favoritesText;
        $chatContent .= "\nClient Question: " . $question;

        // For testing, return the chatContent string before sending it to OpenAI
       // return response()->json(['chatContent' => $chatContent]);

        // OpenAI API Key and URL (this section can be skipped for now)
        $apiKey = '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';
        $apiUrl = 'https://api.openai.com/v1/chat/completions';

        // Define the messages to send to OpenAI
        $messages = [
            [
                'role' => 'system',
                'content' => "You are a chatbot for DarLink, a rental platform. The only data you have access to is the user's favorite properties and their details. Your job is to help the user compare between their favorite properties and answer their questions based on the provided data. For further assistance, the user can contact us at 0781616916.\n make your answer simple direct to point"
            ],
            [
                'role' => 'user',
                'content' => $chatContent
            ]
        ];

        // Define data to send in the API request
        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages
        ];

        // Call the OpenAI API (this part will not run for now)
        $response = $this->callOpenAiApi($apiUrl, $apiKey, $data);

        return response()->json(['message' => $response]);
    }

    private function callOpenAiApi($url, $apiKey, $data)
    {
        $options = [
            'http' => [
                'header' => [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $apiKey,
                ],
                'method' => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            throw new \Exception('Error connecting to OpenAI API');
        }

        $responseData = json_decode($response, true);
        if (isset($responseData['choices'][0]['message']['content'])) {
            return $responseData['choices'][0]['message']['content'];
        } else {
            return 'Error: Invalid response from OpenAI.';
        }
    }
}
