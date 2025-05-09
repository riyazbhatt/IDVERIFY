<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Appointment Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Appointment Booking</h1>

        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('appointment.book')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded p-2" required />
            </div>
            <div class="mb-4">
                <label for="parentage" class="block font-semibold mb-1">Parentage</label>
                <input type="text" name="parentage" id="parentage" class="w-full border border-gray-300 rounded p-2" required />
            </div>
            <div class="mb-4">
                <label for="phone" class="block font-semibold mb-1">Phone Number</label>
                <input type="text" name="phone" id="phone" class="w-full border border-gray-300 rounded p-2" required />
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Email (optional)</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded p-2" />
            </div>
            <div class="mb-4">
                <label for="aadhar_card_number" class="block font-semibold mb-1">Aadhar Card Number</label>
                <input type="text" name="aadhar_card_number" id="aadhar_card_number" class="w-full border border-gray-300 rounded p-2" required />
            </div>
            <div class="mb-4">
                <label for="aadhar_card_image" class="block font-semibold mb-1">Upload Aadhar Card</label>
                <input type="file" name="aadhar_card_image" id="aadhar_card_image" accept="image/*" class="w-full" required />
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Appointment</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH /project/sandbox/user-workspace/id-verification-system/resources/views/appointment/booking.blade.php ENDPATH**/ ?>