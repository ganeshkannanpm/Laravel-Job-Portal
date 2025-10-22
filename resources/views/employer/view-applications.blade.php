<x-employer-dashboard-body>
  <div class="max-w-6xl mx-auto mt-10 bg-white rounded-lg shadow-lg p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <div>
        <h2 class="text-2xl font-semibold text-gray-800">Applications for: {{ $job->title }}</h2>
        <p class="text-gray-500 text-sm mt-4">Total Applicants: 4</p>
      </div>
      <a href="{{ route('employer.manage.jobs') }}" class="text-indigo-600 hover:underline text-sm">← Back to Jobs</a>
    </div>

    <!-- Applications Table -->
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left border border-gray-200">
        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
          <tr>
            <th class="px-6 py-3">Candidate Name</th>
            <th class="px-6 py-3">Email</th>
            <th class="px-6 py-3">Applied Date</th>
            <th class="px-6 py-3">Resume</th>
            <th class="px-6 py-3">Status</th>
            <th class="px-6 py-3 text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Candidate Row Example -->
          @foreach ($job->jobApplication as $application)
            <tr class="hover:bg-gray-50 border-t">
              <td class="px-6 py-4 font-medium">{{ $application->name }}</td>
              <td class="px-6 py-4">{{ $application->email }}</td>
              <td class="px-6 py-4">{{ $application->created_at->format('M d, Y') }}</td>
              <td class="px-6 py-4">
                @if ($application->resume)
                  <a href="{{ asset('storage/' . $application->resume) }}" class="text-indigo-600 hover:underline"
                    target="_blank">Download Resume</a>
                @else
                  <span class="text-gray-400">No Resume</span>
                @endif
              </td>
              <td class="px-6 py-4">
                @php
                  $statusColors = [
                    'Pending' => 'bg-yellow-100 text-yellow-700',
                    'Reviewed' => 'bg-blue-100 text-blue-700',
                    'Shortlisted' => 'bg-green-100 text-green-700',
                    'Rejected' => 'bg-red-100 text-red-700',
                    'Hired' => 'bg-purple-100 text-purple-700',
                  ];
                @endphp

                <span id="status-{{ $application->id }}"
                  class="text-xs px-3 py-1 rounded-full {{ $statusColors[$application->status] ?? 'bg-gray-100 text-gray-700' }}">
                  {{ $application->status }}
                </span>

              </td>
              <td class="px-6 py-4 text-right space-x-2">
                {{-- <button class="px-3 py-1 bg-indigo-500 hover:bg-indigo-600 text-white text-xs rounded">View</button>
                --}}
                <button onclick="openStatusModal({{ $application->id }}, '{{ addslashes($application->user->name) }}')"
                  class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs rounded">
                  Update Status
                </button>

              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

  <!-- Status Update Modal -->
  <div id="statusModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg w-80 p-6 relative">
      <h3 class="text-lg font-semibold mb-4">Update Status</h3>
      <p id="modalCandidateName" class="mb-3 text-gray-700"></p>

      <select id="statusSelect" class="w-full border border-gray-300 rounded px-3 py-2 mb-4">
        <option value="Pending">Pending</option>
        <option value="Reviewed">Reviewed</option>
        <option value="Shortlisted">Shortlisted</option>
        <option value="Rejected">Rejected</option>
        <option value="Hired">Hired</option>
      </select>

      <div class="flex justify-end space-x-2">
        <button onclick="closeStatusModal()"
          class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded text-gray-700 text-sm">Cancel</button>
        <button onclick="updateStatus()"
          class="px-3 py-1 bg-indigo-500 hover:bg-indigo-600 text-white rounded text-sm">Save</button>
      </div>
    </div>
  </div>

  <script>
    let currentApplicationId = '';

    function openStatusModal(id, name) {
      currentApplicationId = id;
      document.getElementById('modalCandidateName').innerText = 'Candidate: ' + name;
      const currentStatus = document.getElementById('status-' + id).innerText.trim();
      document.getElementById('statusSelect').value = currentStatus;
      document.getElementById('statusModal').classList.remove('hidden');
    }

    function closeStatusModal() {
      document.getElementById('statusModal').classList.add('hidden');
    }

    function updateStatus() {
      const newStatus = document.getElementById('statusSelect').value;

      fetch(`/applications/${currentApplicationId}/update-status`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ status: newStatus })
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            const statusSpan = document.getElementById('status-' + currentApplicationId);
            statusSpan.innerText = data.status;

            // Update color
            statusSpan.className = 'text-xs px-3 py-1 rounded-full ' +
              (data.status === 'Pending' ? 'bg-yellow-100 text-yellow-700' :
                data.status === 'Reviewed' ? 'bg-blue-100 text-blue-700' :
                  data.status === 'Shortlisted' ? 'bg-green-100 text-green-700' :
                    data.status === 'Rejected' ? 'bg-red-100 text-red-700' :
                      'bg-purple-100 text-purple-700');

            closeStatusModal();
          }
        })
        .catch(err => {
          console.error('Error updating status:', err);
          alert('Something went wrong!');
        });
    }
  </script>

</x-employer-dashboard-body>