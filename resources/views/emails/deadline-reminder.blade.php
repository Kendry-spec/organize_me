<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deadline Reminder</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h2 class="text-3xl leading-6 font-medium text-gray-900">
                        Reminder: Task Deadline Approaching
                    </h2>
                
                    <p class="mt-2 text-2xl text-gray-600">
                        Task, {{ $category->name }}, is due on {{ $category->deadline }}. <br>
                        Please take action on this task.
                    </p>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>