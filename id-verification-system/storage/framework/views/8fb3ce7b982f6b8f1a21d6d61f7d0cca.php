<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ID Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">ID Verification</h1>

        <form id="verificationForm" action="<?php echo e(route('id_verification.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded p-2" required />
            </div>
            <div class="mb-4">
                <label for="phone" class="block font-semibold mb-1">Phone</label>
                <input type="text" name="phone" id="phone" class="w-full border border-gray-300 rounded p-2" required />
            </div>
            <div class="mb-4">
                <label for="department_id" class="block font-semibold mb-1">Department</label>
                <select name="department_id" id="department_id" class="w-full border border-gray-300 rounded p-2" required>
                    <option value="">Select Department</option>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="designation_id" class="block font-semibold mb-1">Designation</label>
                <select name="designation_id" id="designation_id" class="w-full border border-gray-300 rounded p-2" required>
                    <option value="">Select Designation</option>
                    <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Live Photo Capture</label>
                <video id="video" width="320" height="240" autoplay class="border border-gray-300 rounded"></video>
                <canvas id="canvas" width="320" height="240" class="hidden"></canvas>
                <input type="hidden" name="photo" id="photo" />
                <button type="button" id="captureBtn" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Capture Photo</button>
                <div id="photoPreview" class="mt-2"></div>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Submit</button>
        </form>
    </div>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photoInput = document.getElementById('photo');
        const photoPreview = document.getElementById('photoPreview');
        const captureBtn = document.getElementById('captureBtn');

        // Access the device camera and stream to video element
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                alert('Could not access the camera. Please allow camera access.');
            });

        captureBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const dataUrl = canvas.toDataURL('image/png');
            photoInput.value = dataUrl;
            photoPreview.innerHTML = '<img src="' + dataUrl + '" alt="Captured Photo" class="mt-2 border border-gray-300 rounded" />';
        });

        // Optional: prevent form submission if photo not captured
        document.getElementById('verificationForm').addEventListener('submit', function(e) {
            if (!photoInput.value) {
                e.preventDefault();
                alert('Please capture a photo before submitting.');
            }
        });
    </script>
</body>
</html>
<?php /**PATH /project/sandbox/user-workspace/id-verification-system/resources/views/id_verification/verify.blade.php ENDPATH**/ ?>