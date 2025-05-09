<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bulk Import - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Bulk Import</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.bulk-import') }}" method="POST" enctype="multipart/form-data" id="bulkImportForm">
            @csrf
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">Image</th>
                        <th class="border border-gray-300 p-2">Name</th>
                        <th class="border border-gray-300 p-2">Phone</th>
                        <th class="border border-gray-300 p-2">Department</th>
                        <th class="border border-gray-300 p-2">Designation</th>
                    </tr>
                </thead>
                <tbody id="importRows">
                    <tr>
                        <td class="border border-gray-300 p-2">
                            <input type="file" name="data[0][image]" accept="image/*" required />
                        </td>
                        <td class="border border-gray-300 p-2">
                            <input type="text" name="data[0][name]" class="w-full border border-gray-300 rounded p-1" required />
                        </td>
                        <td class="border border-gray-300 p-2">
                            <input type="text" name="data[0][phone]" class="w-full border border-gray-300 rounded p-1" required />
                        </td>
                        <td class="border border-gray-300 p-2">
                            <select name="data[0][department_id]" class="w-full border border-gray-300 rounded p-1" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="border border-gray-300 p-2">
                            <select name="data[0][designation_id]" class="w-full border border-gray-300 rounded p-1" required>
                                <option value="">Select Designation</option>
                                @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <button type="button" id="addRowBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Row</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Import</button>
            </div>
        </form>
    </div>

    <script>
        let rowIndex = 1;
        document.getElementById('addRowBtn').addEventListener('click', () => {
            const tbody = document.getElementById('importRows');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="border border-gray-300 p-2">
                    <input type="file" name="data[${rowIndex}][image]" accept="image/*" required />
                </td>
                <td class="border border-gray-300 p-2">
                    <input type="text" name="data[${rowIndex}][name]" class="w-full border border-gray-300 rounded p-1" required />
                </td>
                <td class="border border-gray-300 p-2">
                    <input type="text" name="data[${rowIndex}][phone]" class="w-full border border-gray-300 rounded p-1" required />
                </td>
                <td class="border border-gray-300 p-2">
                    <select name="data[${rowIndex}][department_id]" class="w-full border border-gray-300 rounded p-1" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="border border-gray-300 p-2">
                    <select name="data[${rowIndex}][designation_id]" class="w-full border border-gray-300 rounded p-1" required>
                        <option value="">Select Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @endforeach
                    </select>
                </td>
            `;
            tbody.appendChild(newRow);
            rowIndex++;
        });
    </script>
</body>
</html>
