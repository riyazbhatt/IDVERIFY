<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Department Head Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Department Head Dashboard</h1>
        <p class="mb-4 text-gray-600">Welcome to your dashboard. Use the navigation below to manage appointments and other tasks.</p>
        <nav class="mb-6">
            <a href="{{ route('department_head.appointments') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">View Appointments</a>
        </nav>
        <section>
            <h2 class="text-xl font-semibold mb-2 text-gray-700">Dashboard Content</h2>
            <p class="text-gray-600">This is a placeholder for dashboard content such as statistics, notifications, or quick links.</p>
        </section>
    </div>
</body>
</html>
