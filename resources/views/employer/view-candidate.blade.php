<x-employer-dashboard-body>
  <style>
    /* tiny timeline connector */
    .timeline:before {
      content: '';
      position: absolute;
      left: 1.125rem;
      /* centers under the dot */
      top: 1.5rem;
      bottom: 0;
      width: 2px;
      background: linear-gradient(180deg, #e5e7eb, transparent);
    }
  </style>

  <body class="bg-gray-50 text-gray-800">
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
      <!-- Profile Header -->
      <header class="bg-white shadow sm:rounded-lg p-6 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div class="flex items-center gap-4">
            <div class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
              <!-- optional photo -->
              <img
                src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder"
                alt="Candidate photo" class="w-full h-full object-cover">
            </div>
            <div>
              <h1 class="text-2xl font-semibold">{{ $candidate->name }}</h1>
              <p class="text-sm text-gray-700">{{ $application->email }} • Applied for: {{ $application->job->title }}
              </p>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <a href="{{ route('employer.manage.candidates') }}"
              class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
              ← Back
            </a>
            <button
              class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">
              Message</button>
          </div>
        </div>
      </header>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Left column: Profile / Resume / Tabs -->
        <main class="lg:col-span-8 space-y-6">

          <!-- Tabs -->
          <div class="bg-white shadow sm:rounded-lg p-4">
            <div class="flex items-center justify-between">
              <nav class="flex space-x-2" aria-label="Tabs">
                <button class="tab-btn px-3 py-2 text-sm font-medium rounded-md bg-gray-100"
                  data-target="profileTab">Profile</button>
                {{-- <button class="tab-btn px-3 py-2 text-sm font-medium rounded-md text-gray-600"
                  data-target="resumeTab">Resume</button> --}}
                <button class="tab-btn px-3 py-2 text-sm font-medium rounded-md text-gray-600"
                  data-target="activityTab">Activity Log</button>
              </nav>

              <!-- Download Resume -->
              <div>
                <a href="{{ route('employer.resume.download', $candidate->id) }}"
                  class="inline-flex items-center mt-4 text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded-lg shadow-lg transition duration-300 ease-in-out">
                  Download Resume
                </a>
              </div>
            </div>

            <div class="mt-4">
              <!-- Profile Tab -->
              <section id="profileTab" class="tab-panel">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <!-- Personal Details Card -->
                  <div class="border rounded-lg p-4 bg-gray-50">
                    <h3 class="text-lg font-semibold mb-3">Personal Details</h3>
                    <dl class="grid grid-cols-1 gap-y-2 text-sm text-gray-700">
                      <div class="flex justify-between">
                        <dt class="text-gray-500">Phone</dt>
                        <dd>{{ $personalInfo->phone }}</dd>
                      </div>
                      <div class="flex justify-between">
                        <dt class="text-gray-500">Date of Birth</dt>
                        <dd>{{ $personalInfo->date_of_birth }}</dd>
                      </div>
                      <div class="flex justify-between">
                        <dt class="text-gray-500">Gender</dt>
                        <dd>{{ $personalInfo->gender }}</dd>
                      </div>
                      <div class="flex justify-between">
                        <dt class="text-gray-500">Address</dt>
                        <dd class="ms-5">{{ $personalInfo->address }}</dd>
                      </div>
                      <div class="flex justify-between">
                        <dt class="text-gray-500">LinkedIn</dt>
                        <dd><a href="#" class="text-indigo-600">{{ $personalInfo->linkedin_url }}</a></dd>
                      </div>
                    </dl>
                  </div>

                  <!-- Application Details Card -->
                  <div class="border rounded-lg p-4 bg-gray-50">
                    <h3 class="text-lg font-semibold mb-3">Application Details</h3>
                    <dl class="grid grid-cols-1 gap-y-2 text-sm text-gray-700">
                      <div>
                        <dt class="text-gray-500 mb-2">Skills</dt>
                        <dd class="flex flex-wrap gap-2">
                          @foreach ($skills as $skill)
                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">
                              {{ $skill->name }}
                            </span>
                          @endforeach
                        </dd>
                      </div>
                      <div class="flex justify-between">
                        <dt class="text-gray-500">Experience</dt>
                        <dd> Make dynamic 6 years</dd>
                      </div>
                      <div class="flex justify-between">
                        <dt class="text-gray-500">Current Status</dt>
                        <dd>{{ $application->status }}</dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </section>

              <!-- Activity Log Tab -->
              <section id="activityTab" class="tab-panel hidden">
                <div class="space-y-4">
                  <div class="border rounded-lg p-4 bg-gray-50">
                    <h3 class="text-lg font-semibold mb-3">Timeline</h3>
                    <div class="relative timeline pl-8">
                      <div class="mb-6 relative">
                        <div class="absolute left-0 top-0 w-3 h-3 rounded-full bg-indigo-600"></div>
                        <p class="text-sm text-gray-600">2025-10-21 — Application received</p>
                        <p class="text-sm">System: Candidate applied through portal</p>
                      </div>

                      <div class="mb-6 relative">
                        <div class="absolute left-0 top-0 w-3 h-3 rounded-full bg-yellow-500"></div>
                        <p class="text-sm text-gray-600">2025-10-28 — Shortlisted</p>
                        <p class="text-sm">HR: Shortlisted for technical interview</p>
                      </div>

                      <div class="mb-2 relative">
                        <div class="absolute left-0 top-0 w-3 h-3 rounded-full bg-green-600"></div>
                        <p class="text-sm text-gray-600">2025-11-05 — Interview scheduled</p>
                        <p class="text-sm">Interviewer: Interview set for 2025-11-10</p>
                      </div>
                    </div>
                  </div>

                  <!-- Admin Notes -->
                  <div class="border rounded-lg p-4 bg-gray-50">
                    <h3 class="text-lg font-semibold mb-3">Admin Notes / History</h3>
                    <ul class="text-sm space-y-2">
                      <li><strong>2025-11-01:</strong> Candidate asked for time change; rescheduled.</li>
                      <li><strong>2025-10-29:</strong> Resume updated in system by candidate.</li>
                      <li><strong>2025-10-22:</strong> Initial screening pass by HR.</li>
                    </ul>
                  </div>
                </div>
              </section>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <!-- Interview Section -->
            <div class="bg-white border rounded-lg p-4">
              @if($interview)
                <div class="bg-gray-50 border rounded-lg p-4">
                  <h3 class="text-lg font-semibold text-green-700 mb-2">Interview Details</h3>
                  <div class="space-y-2 text-gray-700">
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($interview->interview_date)->format('d M Y') }}</p>
                    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($interview->interview_time)->format('h:i A') }}</p>
                    <p><strong>Location:</strong> {{ $interview->location ?? 'Not specified' }}</p>
                    <p><strong>Mode:</strong> {{ $interview->mode }}</p>
                  </div>
                  <div class="mt-3 flex gap-2">
                    <button id="rescheduleBtn" class="px-3 py-1 text-sm bg-indigo-600 text-white rounded-md">
                      Reschedule
                    </button>
                    <form action="{{ route('employer.cancel.interview', $interview->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to cancel this interview?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded-md">Cancel</button>
                    </form>
                  </div>
                </div>
              @else
                <div class="bg-yellow-50 border border-yellow-300 rounded-lg p-4">
                  <h3 class="text-lg font-semibold text-yellow-700 mb-2">Interview not scheduled yet</h3>
                  <p class="text-gray-600">Click the “Schedule Interview” button to plan one.</p>
                </div>
              @endif
            </div>

            <!-- Notes Section -->
            <aside class="bg-white border rounded-lg p-4">
              <h3 class="text-lg font-semibold text-green-700 mb-4">Notes</h3>
              @forelse($notes as $note)
                <div class="border rounded-md p-3 mb-3">
                  <h4 class="font-semibold">{{ $note->title }}</h4>
                  <p class="text-gray-700">{{ $note->note }}</p>
                  <p class="text-sm text-gray-500 mt-1">
                    Added by: {{ $note->creator->name ?? 'Unknown' }}
                    • {{ $note->created_at->format('d M Y, h:i A') }}
                  </p>
                  <div class="mt-2 flex gap-2">
                    {{-- <button id="editNoteBtn" class="px-3 py-1 text-sm bg-indigo-600 text-white rounded-md">Edit</button> --}}
                    <form action="{{ route('employer.note.delete', $note->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this note?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded-md">Delete</button>
                    </form>
                  </div>
                </div>
              @empty
                <p class="text-gray-600">No notes added yet.</p>
              @endforelse
            </aside>
          </div>

        </main>

        <!-- Right column: Quick details, timeline, actions -->
        <aside class="lg:col-span-4 space-y-6">

          <div class="bg-white border rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-3">Quick Info</h3>
            <dl class="text-sm text-gray-700">
              <div class="flex justify-between py-1">
                <dt class="text-gray-500">Applied On</dt>
                <dd>{{ $application->created_at->format('M d, Y') }}</dd>
              </div>
              <div class="flex justify-between py-1">
                <dt class="text-gray-500">Source</dt>
                <dd>Company Careers</dd>
              </div>
              <div class="flex justify-between py-1">
                <dt class="text-gray-500">Location</dt>
                <dd>{{ $personalInfo->city }}</dd>
              </div>
              <div class="flex justify-between py-1">
                <dt class="text-gray-500">Notice Period</dt>
                <dd>2 months</dd>
              </div>
            </dl>
          </div>

          <div class="bg-white border rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-3">Actions</h3>
            <div class="flex flex-col gap-2">

              @if($interview)
                <!-- Disable if interview exists -->
                <button disabled class="px-3 py-2 bg-gray-400 text-white rounded-md text-center cursor-not-allowed">
                  Interview Scheduled
                </button>
              @else
                <!-- Enable if no interview -->
                <a href="#" id="openModalBtn" class="px-3 py-2 bg-indigo-600 text-white rounded-md text-center">
                  Schedule Interview
                </a>
              @endif
              <a href="" id="openAddNoteModalBtn" class="px-3 py-2 border rounded-md text-center">Add Note</a>
            </div>
          </div>


          <!-- Modal Interview -->
          <div id="interviewModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

            <!-- Modal Content -->
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Schedule Interview</h2>
                <button id="closeModalBtn"
                  class="text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>
              </div>
              <!-- Success or Error Messages -->
              @if (session('success'))
                <div class="mb-3 p-2 text-green-700 bg-green-100 border border-green-300 rounded-md">
                  {{ session('success') }}
                </div>
              @endif

              @if (session('error'))
                <div class="mb-3 p-2 text-red-700 bg-red-100 border border-red-300 rounded-md">
                  {{ session('error') }}
                </div>
              @endif

              @if ($errors->any())
                <div class="mb-3 p-2 text-red-700 bg-red-100 border border-red-300 rounded-md">
                  <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form action=" {{ $interview
  ? route('employer.reschedule.interview', $interview->id)
  : route('employer.schedule.interview') }}" method="POST">

                @csrf
                @if($interview)
                  @method('PUT')
                @endif

                <!-- Hidden fields for candidate_id and job_id -->
                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                <input type="hidden" name="job_id" value="{{ $application->job_id }}">

                <div class="mb-3">
                  <label class="block text-gray-700 mb-1">Interview Date</label>
                  <input type="date" name="interview_date" class="border w-full p-2 rounded-md"
                    value="{{ $interview->interview_date ?? '' }}">
                </div>

                <div class="mb-3">
                  <label class="block text-gray-700 mb-1">Interview Time</label>
                  <input type="time" name="interview_time" class="border w-full p-2 rounded-md"
                    value="{{ $interview->interview_time ?? '' }}">
                </div>

                <div class="mb-3">
                  <label class="block text-gray-700 mb-1">Location</label>
                  <input type="text" name="location" class="border w-full p-2 rounded-md"
                    value="{{ $interview->location ?? '' }}">
                </div>

                <div class="mb-3">
                  <label class="block text-gray-700 mb-1">Mode</label>
                  <select name="mode" class="border w-full p-2 rounded-md">
                    <option value="Online" {{ isset($interview) && $interview->mode === 'Online' ? 'selected' : '' }}>
                      Online</option>
                    <option value="In-Person" {{ isset($interview) && $interview->mode === 'In-Person' ? 'selected' : '' }}>In-Person</option>
                  </select>
                </div>

                <button type="submit" class="bg-indigo-600 text-white w-full py-2 rounded-md">
                  {{ $interview ? 'Reschedule Interview' : 'Save' }}
                </button>
              </form>
            </div>
          </div>

          <!-- Modal Add Note -->
          <div id="addNoteModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

            <!-- Modal Content -->
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md relative">
              <!-- Close Button -->
              <button id="closeAddNoteModalBtn"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>

              <h2 class="text-xl font-semibold mb-4">Add Note</h2>
              <form action="{{ route('employer.note.store') }}" method="POST">
                @csrf

                {{-- Hidden IDs (pass current candidate/job context) --}}
                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                <input type="hidden" name="job_id" value="{{ $application->job_id }}">

                {{-- Title --}}
                <div class="mb-3">
                  <label class="block text-gray-700 mb-1 font-medium">Title</label>
                  <input type="text" name="title" class="border w-full p-2 rounded-md focus:ring focus:ring-indigo-200"
                    placeholder="Enter note title" required>
                </div>

                {{-- Note --}}
                <div class="mb-3">
                  <label class="block text-gray-700 mb-1 font-medium">Note</label>
                  <textarea name="note" class="border w-full p-2 rounded-md focus:ring focus:ring-indigo-200" rows="4"
                    placeholder="Type your note here..." required></textarea>
                </div>

                {{-- Mode --}}
                <div class="mb-3">
                  <label class="block text-gray-700 mb-1 font-medium">Mode</label>
                  <select name="mode" id="modeSelect"
                    class="border w-full p-2 rounded-md focus:ring focus:ring-indigo-200" required>
                    <option value="General">General</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Reminder">Reminder</option>
                    <option value="Follow-up">Follow-up</option>
                  </select>
                </div>

                {{-- Reminder Date (only shows when mode = Reminder or Follow-up) --}}
                <div class="mb-3 hidden" id="reminderDateSection">
                  <label class="block text-gray-700 mb-1 font-medium">Reminder Date & Time</label>
                  <input type="datetime-local" name="reminder_date"
                    class="border w-full p-2 rounded-md focus:ring focus:ring-indigo-200">
                </div>

                {{-- Status --}}
                <div class="mb-3 hidden" id="statusSection">
                  <label class="block text-gray-700 mb-1 font-medium">Status</label>
                  <select name="status" class="border w-full p-2 rounded-md">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                  </select>
                </div>

                <button type="submit"
                  class="bg-indigo-600 text-white w-full py-2 rounded-md hover:bg-indigo-700 transition">
                  Save Note
                </button>
              </form>
            </div>
          </div>

        </aside>
      </div>
    </div>

    <script>
      //Modal for Interview & Add Note
      function setupModal(openBtnId, modalId, closeBtnId) {
        const openBtn = document.getElementById(openBtnId);
        const modal = document.getElementById(modalId);
        const closeBtn = document.getElementById(closeBtnId);

        if (!openBtn || !modal || !closeBtn) return; // Prevent JS errors if element missing

        openBtn.addEventListener('click', (e) => {
          e.preventDefault();
          modal.classList.remove('hidden');
        });

        closeBtn.addEventListener('click', () => {
          modal.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
          if (e.target === modal) modal.classList.add('hidden');
        });
      }

      // Apply to both modals
      setupModal('openModalBtn', 'interviewModal', 'closeModalBtn');
      setupModal('rescheduleBtn', 'interviewModal', 'closeModalBtn');
      setupModal('openAddNoteModalBtn', 'addNoteModal', 'closeAddNoteModalBtn');
      // setupModal('editNoteBtn','addNoteModal','closeAddNoteModalBtn')

      //show reminder date & status dynamically for add note modal
      const modeSelect = document.getElementById('modeSelect');
      const reminderDateSection = document.getElementById('reminderDateSection');
      const statusSection = document.getElementById('statusSection');

      modeSelect.addEventListener('change', function () {
        const selected = this.value;
        if (selected === 'Reminder' || selected === 'Follow-up') {
          reminderDateSection.classList.remove('hidden');
          statusSection.classList.remove('hidden');
        } else {
          reminderDateSection.classList.add('hidden');
          statusSection.classList.add('hidden');
        }
      });

      // shortlist
      document.getElementById('shortlistBtn').addEventListener('click', function () {
        const statusText = document.getElementById('status').querySelector('span');
        statusText.textContent = 'Shortlisted';
        statusText.classList.add('text-green-600', 'font-semibold');
        this.disabled = true;
        this.textContent = 'Shortlisted';
        this.classList.add('bg-green-100', 'text-green-700', 'cursor-not-allowed');
      });

      // Tab switcher
      document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('bg-gray-100'));
          document.querySelectorAll('.tab-btn').forEach(b => b.classList.add('text-gray-600'));
          btn.classList.add('bg-gray-100');
          btn.classList.remove('text-gray-600');

          const target = btn.getAttribute('data-target');
          document.querySelectorAll('.tab-panel').forEach(p => p.classList.add('hidden'));
          document.getElementById(target).classList.remove('hidden');
        });
      });

      // Status change handling (visual only)
      function changeStatus(val) {
        const badge = document.getElementById('statusBadge');
        badge.textContent = val;
        badge.className = 'px-3 py-1 rounded-full text-sm font-medium';
        if (val === 'Active') {
          badge.classList.add('bg-green-100', 'text-green-800');
        } else if (val === 'Rejected') {
          badge.classList.add('bg-red-100', 'text-red-800');
        } else {
          badge.classList.add('bg-yellow-100', 'text-yellow-800');
        }
      }

      document.addEventListener("DOMContentLoaded", function () {
        // If Laravel flashed a success or error message, show the modal
        @if(session('success') || session('error') || $errors->any())
          document.getElementById('interviewModal').classList.remove('hidden');
        @endif
});
    </script>
  </body>
</x-employer-dashboard-body>