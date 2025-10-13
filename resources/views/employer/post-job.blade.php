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
            <main class="lg:col-span-9 mt-10">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    <!-- Form -->
                    <section class="bg-white p-6 rounded-lg border">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold">Post a Job</h2>
                            <div class="text-sm text-slate-500">Draft autosaved • Preview on the right</div>
                        </div>

                        <form class="space-y-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Job Title</label>
                                    <input type="text" placeholder="Senior Backend Developer"
                                        class="w-full rounded-md border p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Employment Type</label>
                                    <select class="w-full rounded-md border p-2 text-sm">
                                        <option>Full-time</option>
                                        <option>Part-time</option>
                                        <option>Contract</option>
                                        <option>Internship</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Location</label>
                                    <input type="text" placeholder="Bengaluru, India or Remote"
                                        class="w-full rounded-md border p-2 text-sm" />
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Experience Level</label>
                                    <select class="w-full rounded-md border p-2 text-sm">
                                        <option>Entry</option>
                                        <option>Mid</option>
                                        <option>Senior</option>
                                        <option>Lead</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Salary (optional)</label>
                                    <div class="flex gap-2">
                                        <input type="text" placeholder="₹ 40,000"
                                            class="w-full rounded-md border p-2 text-sm" />
                                        <input type="text" placeholder="₹ 60,000"
                                            class="w-full rounded-md border p-2 text-sm" />
                                    </div>
                                    <p class="text-xs text-slate-500 mt-1">You can provide a range or write
                                        "Competitive"</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Application Type</label>
                                    <div class="flex gap-2 items-center">
                                        <label class="inline-flex items-center gap-2 text-sm"><input type="radio"
                                                name="apply" checked /> Apply via Email</label>
                                        <label class="inline-flex items-center gap-2 text-sm"><input type="radio"
                                                name="apply" /> External URL</label>
                                    </div>
                                    <input type="text" placeholder="hr@acme.com or https://example.com/apply"
                                        class="w-full rounded-md border p-2 mt-2 text-sm" />
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Job Description</label>
                                <textarea rows="6" placeholder="Describe role, responsibilities, and expectations..."
                                    class="w-full rounded-md border p-3 text-sm"></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Responsibilities</label>
                                <textarea rows="3" placeholder="List responsibilities, one per line"
                                    class="w-full rounded-md border p-3 text-sm"></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Requirements / Skills</label>
                                <div class="flex gap-2 items-center">
                                    <input id="skill-input" type="text"
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
                                    <input type="date" class="w-full rounded-md border p-2 text-sm" />
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Highlight / Featured</label>
                                    <div class="flex items-center gap-3">
                                        <label class="inline-flex items-center gap-2"><input type="checkbox" /> Mark as
                                            Featured</label>
                                        <span class="text-xs text-slate-500">(Optional — paid)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end gap-3 pt-2">
                                <button type="button" class="px-4 py-2 rounded-md border text-sm">Save Draft</button>
                                <button type="submit"
                                    class="px-4 py-2 rounded-md bg-indigo-600 text-white text-sm">Publish Job</button>
                            </div>
                        </form>
                    </section>

                    <!-- Live Preview -->
                    <aside class="bg-white p-6 rounded-lg border">
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
                    </aside>
                </div>
            </main>

        <!-- Minimal JS for tag input (prototype only) -->
        <script>
            (function () {
                const input = document.getElementById('skill-input');
                const skillsWrap = document.getElementById('skills');

                function addTag(text) {
                    if (!text) return;
                    const span = document.createElement('span');
                    span.className = 'tag';
                    span.innerHTML = text + ' <button class="ml-1 text-xs">✕</button>';
                    skillsWrap.appendChild(span);
                    const btn = span.querySelector('button');
                    btn.addEventListener('click', () => span.remove());
                }

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addTag(input.value.trim());
                        input.value = '';
                    }
                });
            })();
        </script>
    </body>
</x-employer-dashboard-body>