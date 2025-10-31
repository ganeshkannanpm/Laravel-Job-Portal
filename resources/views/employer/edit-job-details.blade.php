<x-employer-dashboard-body>
    <style>
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
        <main class="w-full mt-10">
            <div class="grid gap-6">
                <!-- Update Form -->
                <section class="bg-white p-6 rounded-lg border">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold">Update Job</h2>
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

                    <form action="{{ route('employer.update.profile',$job->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Job Title</label>
                                <input type="text" name="title" value="{{ old('title', $job->title) }}"
                                    class="w-full rounded-md border p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Company</label>
                                <input type="text" name="company" value="{{ old('company', $job->company) }}"
                                    class="w-full rounded-md border p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Employment Type</label>
                                <select name="schedule" class="w-full rounded-md border p-2 text-sm">
                                    @foreach (['Full-time', 'Part-time', 'Contract', 'Internship'] as $type)
                                        <option value="{{ $type }}" {{ old('schedule', $job->schedule) == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Location</label>
                                <input type="text" name="location" value="{{ old('location', $job->location) }}"
                                    class="w-full rounded-md border p-2 text-sm" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Experience Level</label>
                                <select name="experience_level" class="w-full rounded-md border p-2 text-sm">
                                    @foreach (['Entry', 'Mid', 'Senior', 'Lead'] as $level)
                                        <option value="{{ $level }}" {{ old('experience_level', $job->experience_level) == $level ? 'selected' : '' }}>
                                            {{ $level }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Salary (optional)</label>
                                <div class="flex gap-2">
                                    <input type="number" name="salary_min"
                                        value="{{ old('salary_min', $job->salary_min) }}"
                                        class="w-full rounded-md border p-2 text-sm" />
                                    <input type="number" name="salary_max"
                                        value="{{ old('salary_max', $job->salary_max) }}"
                                        class="w-full rounded-md border p-2 text-sm" />
                                </div>
                                <p class="text-xs text-slate-500 mt-1">Provide a range or write “Competitive”</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Application Type</label>
                                <div class="flex gap-2 items-center">
                                    <label class="inline-flex items-center gap-2 text-sm">
                                        <input type="radio" name="apply_type" value="email"
                                            {{ old('apply_type', $job->apply_type) == 'email' ? 'checked' : '' }} />
                                        Apply via Email
                                    </label>
                                    <label class="inline-flex items-center gap-2 text-sm">
                                        <input type="radio" name="apply_type" value="external"
                                            {{ old('apply_type', $job->apply_type) == 'external' ? 'checked' : '' }} />
                                        External URL
                                    </label>
                                </div>
                                <input type="text" name="apply_link"
                                    value="{{ old('apply_link', $job->apply_link) }}"
                                    class="w-full rounded-md border p-2 mt-2 text-sm" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Job Description</label>
                            <textarea rows="6" name="description" class="w-full rounded-md border p-3 text-sm">{{ old('description', $job->description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Responsibilities</label>
                            <textarea rows="3" name="responsibilities" class="w-full rounded-md border p-3 text-sm">{{ old('responsibilities', $job->responsibilities) }}</textarea>
                        </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" >
                        <div>
                            <label class="block text-sm font-medium mb-1">About Company</label>
                            <textarea rows="3" name="about_company" class="w-full rounded-md border p-3 text-sm">{{ old('about_company', $job->about_company) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Skills</label>
                            <div class="flex gap-2 items-center">
                                <input id="skill-input" type="text" placeholder="Type skill and press Enter"
                                    class="flex-1 rounded-md border p-2 text-sm" />
                                <button type="button"
                                    class="px-3 py-2 text-sm rounded-md border hover:bg-slate-50">Add</button>
                            </div>
                            <div id="skills" class="mt-3 flex flex-wrap gap-2">
                                @foreach (explode(',', $job->skills_required) as $skill)
                                    <span class="tag">{{ trim($skill) }} <button class="ml-1 text-xs">✕</button></span>
                                @endforeach
                            </div>
                        </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Application Deadline</label>
                                <input type="date" name="deadline" value="{{ old('deadline', $job->deadline) }}"
                                    class="w-full rounded-md border p-2 text-sm" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Highlight / Featured</label>
                                <div class="flex items-center gap-3">
                                    <label class="inline-flex items-center gap-2">
                                        <input type="checkbox" name="featured"
                                            {{ old('featured', $job->featured) ? 'checked' : '' }} />
                                        Mark as Featured
                                    </label>
                                    <span class="text-xs text-slate-500">(Optional — paid)</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('employer.view.jobs') }}"
                                class="px-4 py-2 rounded-md border text-sm hover:bg-slate-50">Cancel</a>
                            <button type="submit"
                                class="px-4 py-2 rounded-md bg-indigo-600 text-white text-sm">Update Job</button>
                        </div>
                    </form>
                </section>
            </div>
        </main>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const input = document.getElementById('skill-input');
                const skillsContainer = document.getElementById('skills');

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'skills_required';
                input.closest('form').appendChild(hiddenInput);

                let skills = @json(explode(',', $job->skills_required));

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addSkill(input.value.trim());
                    }
                });

                input.nextElementSibling.addEventListener('click', () => {
                    addSkill(input.value.trim());
                });

                function addSkill(skill) {
                    if (skill && !skills.includes(skill)) {
                        skills.push(skill);
                        renderSkills();
                        input.value = '';
                    }
                }

                function removeSkill(skill) {
                    skills = skills.filter(s => s !== skill);
                    renderSkills();
                }

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

                renderSkills();
            });
        </script>
    </body>
</x-employer-dashboard-body>
