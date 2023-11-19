<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uniquesports24</title>

  <!-- Tailwind CSS CDN link -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Bootstrap 5 CDN link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>
<body class="bg-gray-800 text-white font-sans text-center">



<nav class="bg-dark dark:bg-dark-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap" style="text-decoration: none; color:white;">Uniquesports24</span>
    </a>
  </div>
</nav>

<!-- Search Bar -->
<div class="container mx-auto my-6" style="color: black;">
    <form action="{{ route('searchFixtures') }}" method="GET" class="flex items-center">
        <input type="text" name="search" id="search" placeholder="Search..." class="w-full p-2 border border-gray-600 rounded focus:outline-none focus:border-blue-500">
        <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

<!-- Display search term -->
<h2>Search Results for "{{ $searchTerm }}"</h2>

<!-- Display fixtures data as needed -->
@foreach($filteredFixtures as $data)
    <div class="mb-8 p-6 bg-gray-700 rounded shadow-md two-column" style="margin: 50px;">
        <div class="left-column">
            <p class="text-xl text-white font-bold">Fixture ID: {{ $data["id"] }}</p>
            <p class="text-gray-400">Sport: {{ $data["sport_id"] }}</p>
            <p class="text-gray-400">League: {{ $data["league_id"] }}</p>

            <div class="flex justify-center items-center mt-5">
                <div class="flex items-center space-x-4">
                    @foreach($data["participants"] as $participant)
                        @if (isset($participant["image_path"]))
                            <img src="{{ asset($participant['image_path']) }}" alt="{{ $participant['name'] }} Image" class="w-12 h-12 rounded-full">
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mt-4">
                @foreach ($data["participants"] as $participant)
                    <div>
                        <!-- Include other event details as needed -->
                        <p class="text-white font-bold">{{ $participant['last_played_at'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="right-column">
            <p class="text-white font-bold mt-4">Team Information:</p>

            @foreach ($data["participants"] as $participant)
                <div class="flex items-center mt-2 cursor-pointer">
                    <img src="{{ $participant['image_path'] }}" alt="{{ $participant['name'] }}" class="w-8 h-8 mr-2 rounded-full">
                    <p class="text-white">{{ $participant['name'] }}</p>
                </div>
                <!-- Additional Information -->
                <div class="additional-info hidden bg-gray-800 p-2 rounded mt-2">
                    <p class="text-white">Founded: {{ $participant['founded'] }}</p>
                    <p class="text-white">Name: {{ $participant['name'] }}</p>
                    <p class="text-white">Short: {{ $participant['short_code'] }}</p>
                    <img src="{{ $participant['image_path'] }}" alt="{{ $participant['name'] }}">
                    <p class="text-white">Last played at: {{ $participant['last_played_at'] }}</p>
                </div>
            @endforeach
            <button class="show-more-btn text-white mt-4" style="background-color: red; color: white; padding: 15px; font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            border-radius:30px">Show More</button>
        </div>
    </div>
@endforeach


<footer class="bg-dark rounded-lg shadow m-4 dark:bg-dark-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
          <span class="text-sm text-gray-500 sm:text-center white:text-white-400" style="color: white;">© 2023 <a href="{{ url('/') }}" class="hover:underline">Uniquesports24™</a>. All Rights Reserved.
        </span>
        </div>
    </footer>

    <script src="js/main.js"></script>
    <!-- Bootstrap 5 JS and Popper.js CDN links (add these at the end of the body) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
