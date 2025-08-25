<div class="mx-5 bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow-md transition relative">

    <!-- Save Job Button -->
    <button class="absolute top-2 right-2 save-job-btn" data-job-id="{{ $job->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.014-4.5-4.5-4.5-1.77 0-3.292 
             1.02-4.031 2.482C11.792 4.77 10.27 
             3.75 8.5 3.75 6.014 3.75 4 
             5.765 4 8.25c0 7.22 8.25 
             11.25 8.25 11.25S21 15.47 21 8.25z" />
        </svg>
    </button>


    <!-- Job Title -->
    <h2 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h2>

    <!-- Employer -->
    <p class="text-sm text-gray-600 mt-1">{{ $job->employer->name }}</p>

    <!-- Salary -->
    <div class="mt-3 flex items-center text-gray-700 text-sm">
        💰 <span class="ml-2">{{ $job->salary }}</span>
    </div>

    <!-- Location -->
    <div class="mt-1 flex items-center text-gray-700 text-sm">
        📍 <span class="ml-2">{{ $job->location }}</span>
    </div>

    <!-- Job Type -->
    <div class="mt-3">
        <span class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 text-gray-800 rounded-full">
            {{ $job->schedule }}
        </span>
    </div>

    <!-- Apply Button -->
    <div class="mt-4">
        <x-forms.button>Apply Now</x-forms.button>
    </div>

</div>

<script>
    document.querySelectorAll('.save-job-btn').forEach(button => {
        button.addEventListener('click', function () {
            let jobId = this.dataset.jobId;
            let svg = this.querySelector('svg');

            fetch(`/jobs/${jobId}/save`, {
                method: 'POST',
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Content-Type": "application/json"
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'saved') {
                        svg.setAttribute('fill', 'red'); 
                    } else {
                        svg.setAttribute('fill', 'black'); 
                    }
                });
        });
    });

</script>