<x-employer-dashboard-body>
    <style>
        /* tiny helper for tag inputs */
        .tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            background-color: rgba(15, 23, 42, 0.06);
        }
    </style>

    <body class="bg-slate-50 text-slate-900">
        <!-- Main form + preview -->
        <main class="w-full mt-10">
            <div class="grid gap-6">
                <!-- Form -->
                <section class="bg-white p-6 rounded-lg border">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold">Post a Job</h2>
                        {{-- <div class="text-sm text-slate-500">Draft autosaved • Preview on the right</div> --}}
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('employer.jobs.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Job Title</label>
                                <input type="text" name="title"
                                    class="w-full rounded-md border p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Company</label>
                                <input type="text" name="company"
                                    class="w-full rounded-md border p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Employment Type</label>
                                <select name="schedule" class="w-full rounded-md border p-2 text-sm">
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Internship">Internship</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Location</label>
                                <input type="text" name="location" placeholder="Bengaluru, India or Remote"
                                    class="w-full rounded-md border p-2 text-sm" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Experience Level</label>
                                <select name="experience_level" class="w-full rounded-md border p-2 text-sm">
                                    <option value="Entry">Entry</option>
                                    <option value="Mid">Mid</option>
                                    <option value="Senior">Senior</option>
                                    <option value="Lead">Lead</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Salary (optional)</label>
                                <div class="flex gap-2">
                                    <input type="number" placeholder="₹ 40,000" name="salary_min"
                                        class="w-full rounded-md border p-2 text-sm" />
                                    <input type="number" placeholder="₹ 60,000" name="salary_max"
                                        class="w-full rounded-md border p-2 text-sm" />
                                </div>
                                <p class="text-xs text-slate-500 mt-1">You can provide a range or write
                                    "Competitive"</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Application Type</label>
                                <div class="flex gap-2 items-center">
                                    <label class="inline-flex items-center gap-2 text-sm"><input type="radio"
                                            name="apply_type" value="email" /> Apply via Email</label>
                                    <label class="inline-flex items-center gap-2 text-sm"><input type="radio"
                                            name="apply_type" value="external" /> External URL</label>
                                </div>
                                <input type="text" name="apply_link" placeholder=" hr@acme.com or
                                    https://example.com/apply" class="w-full rounded-md border p-2 mt-2 text-sm" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Job Description</label>
                            <textarea rows="6" placeholder="Describe role, responsibilities, and expectations..."
                                name="description" class="w-full rounded-md border p-3 text-sm"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Responsibilities</label>
                            <textarea rows="3" name="responsibilities"
                                class="w-full rounded-md border p-3 text-sm"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">About Company</label>
                            <textarea rows="3" name="about_company"
                                class="w-full rounded-md border p-3 text-sm"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Skills</label>
                            <div class="flex gap-2 items-center">
                                <input id="skill-input" type="text" name="skills_required"
                                    placeholder="Type skill and press Enter (eg. PHP, Laravel)"
                                    class="flex-1 rounded-md border p-2 text-sm" />
                                <button type="button"
                                    class="px-3 py-2 text-sm rounded-md border hover:bg-slate-50">Add</button>
                            </div>
                            <div id="skills" class="mt-3 flex flex-wrap gap-2">
                                <span class="tag">PHP <button class="ml-1 text-xs">✕</button></span>
                                <span class="tag">Laravel <button class="ml-1 text-xs">✕</button></span>
                                <span class="tag">MySQL <button class="ml-1 text-xs">✕</button></span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Application Deadline</label>
                                <input type="date" name="deadline" class="w-full rounded-md border p-2 text-sm" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Highlight / Featured</label>
                                <div class="flex items-center gap-3">
                                    <label class="inline-flex items-center gap-2"><input type="checkbox"
                                            name="featured" /> Mark as
                                        Featured</label>
                                    <span class="text-xs text-slate-500">(Optional — paid)</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <button type="button" class="px-4 py-2 rounded-md border text-sm">Save Draft</button>
                            <button type="submit" class="px-4 py-2 rounded-md bg-indigo-600 text-white text-sm">Publish
                                Job</button>
                        </div>
                    </form>
                </section>

                <!-- Live Preview -->
                {{-- <aside class="bg-white p-6 rounded-lg border">
                    <h3 class="text-md font-semibold mb-3">Live Preview</h3>
                    <div class="space-y-3">
                        <div class="p-4 border rounded">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h4 class="text-lg font-bold">Senior Backend Developer</h4>
                                    <div class="text-sm text-slate-600">Acme Corp • Bengaluru, India • Full-time
                                    </div>
                                </div>
                                <div class="text-sm text-indigo-600 font-medium">₹40k - ₹60k</div>
                            </div>

                            <div class="mt-3 text-sm text-slate-700">
                                <p>We are looking for a Senior Backend Developer to join our team. You will work on
                                    scalable APIs, microservices and backend systems.</p>
                            </div>

                            <div class="mt-3">
                                <h5 class="text-sm font-semibold">Skills</h5>
                                <div class="flex gap-2 mt-2 flex-wrap">
                                    <span class="tag">PHP</span>
                                    <span class="tag">Laravel</span>
                                    <span class="tag">MySQL</span>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <div class="text-xs text-slate-500">Published: Not yet</div>
                                <div class="flex gap-2">
                                    <button class="text-xs px-2 py-1 border rounded">Edit</button>
                                    <button class="text-xs px-2 py-1 bg-indigo-600 text-white rounded">View
                                        Applicants</button>
                                </div>
                            </div>
                        </div>

                        <div class="text-xs text-slate-500">Tip: Use short bullet points in description for higher
                            applicant conversions.</div>
                    </div>
                </aside> --}}
            </div>
        </main>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const input = document.getElementById('skill-input');
                const skillsContainer = document.getElementById('skills');

                // Create hidden input to store all skills
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'skills_required';
                input.closest('form').appendChild(hiddenInput);

                let skills = [];

                // Add skill when pressing Enter or clicking Add button
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addSkill(input.value.trim());
                    }
                });

                input.nextElementSibling.addEventListener('click', () => {
                    addSkill(input.value.trim());
                });

                // Add skill function
                function addSkill(skill) {
                    if (skill && !skills.includes(skill)) {
                        skills.push(skill);
                        renderSkills();
                        input.value = '';
                    }
                }

                // Remove skill
                function removeSkill(skill) {
                    skills = skills.filter(s => s !== skill);
                    renderSkills();
                }

                // Render all skills
                function renderSkills() {
                    skillsContainer.innerHTML = '';
                    skills.forEach(skill => {
                        const tag = document.createElement('span');
                        tag.className = 'px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm flex items-center gap-2';
                        tag.innerHTML = `${skill} <button type="button" class="text-xs text-red-600">✕</button>`;
                        tag.querySelector('button').addEventListener('click', () => removeSkill(skill));
                        skillsContainer.appendChild(tag);
                    });
                    hiddenInput.value = skills.join(', ');
                }
            });
        </script>

    </body>
</x-employer-dashboard-body>