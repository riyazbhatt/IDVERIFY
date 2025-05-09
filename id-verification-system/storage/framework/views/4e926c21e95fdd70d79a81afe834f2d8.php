<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ID Verification Receipt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">ID Verification Receipt</h1>

        <div class="mb-4">
            <img src="<?php echo e($photoUrl); ?>" alt="Applicant Photo" class="w-48 h-48 object-cover rounded border border-gray-300" />
        </div>

        <div class="mb-4">
            <p><strong>Name:</strong> <?php echo e($idVerification->name); ?></p>
            <p><strong>Phone:</strong> <?php echo e($idVerification->phone); ?></p>
            <p><strong>Department:</strong> <?php echo e($idVerification->department->name); ?></p>
            <p><strong>Designation:</strong> <?php echo e($idVerification->designation->name); ?></p>
            <p><strong>UID:</strong> <?php echo e($idVerification->uid); ?></p>
        </div>

        <div class="mb-4">
            <img src="<?php echo e($qrCodeUrl); ?>" alt="QR Code" class="w-48 h-48" />
        </div>

        <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Print Receipt</button>
    </div>
</body>
</html>
<?php /**PATH /project/sandbox/user-workspace/id-verification-system/resources/views/id_verification/receipt.blade.php ENDPATH**/ ?>