<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FootballController extends Controller
{
    public function getFixturesData()
    {
        // API endpoint URL
        $apiUrl = 'https://api.sportmonks.com/v3/football/fixtures';
        $apiToken = '91smisQiRfAo9NLcBhUYRLeTqMkhgfDywMA4geT0UTSgz3jRq1CE7NY5Wkqs';

        // Make the API request
        $response = Http::get($apiUrl, [
            'api_token' => $apiToken,
            'include' => 'participants;events',
        ]);

        // Check for errors
        if ($response->failed()) {
            return response()->json(['error' => 'Error occurred while fetching API data'], 500);
        }

        // Decode the JSON response
        $data = $response->json();

        // Check if 'data' key exists in the response
        if (isset($data['data'])) {
            // Access fixtures data
            $fixtures = $data['data'];

            // Return the fixtures data as JSON
            // return response()->json($fixtures);
            return view("welcome", compact("fixtures"));
        } else {
            return response()->json(['error' => 'Invalid response format'], 500);
        }
    }

    public function searchFixtures(Request $request)
    {
        $apiUrl = 'https://api.sportmonks.com/v3/football/fixtures';
        $apiToken = '91smisQiRfAo9NLcBhUYRLeTqMkhgfDywMA4geT0UTSgz3jRq1CE7NY5Wkqs';
    
        // Get the search term from the request
        $searchTerm = $request->input('search');
    
        // Make the API request with the search term
        $response = Http::get($apiUrl, [
            'api_token' => $apiToken,
            'include' => 'participants;events',
            'search' => $searchTerm, // Use the search parameter for name search
        ]);
    
        // Check for errors
        if ($response->failed()) {
            return response()->json(['error' => 'Error occurred while fetching API data'], 500);
        }
    
        // Decode the JSON response
        $data = $response->json();
    
        // Initialize $fixtures outside of the if block
        $fixtures = [];
    
        // Check if 'data' key exists in the response
        if (isset($data['data'])) {
            // Access fixtures data
            $fixtures = $data['data'];
    
            // Filter fixtures by name
            $filteredFixtures = array_filter($fixtures, function ($fixture) use ($searchTerm) {
                return str_contains(strtolower($fixture['name']), strtolower($searchTerm));
            });
    
            // Return the filtered fixtures data as JSON or pass it to a view
            return view("search-results", compact("filteredFixtures", "searchTerm"));
        } else {
            return response()->json(['error' => 'Invalid response format'], 500);
        }
    }
    
    
    
}
