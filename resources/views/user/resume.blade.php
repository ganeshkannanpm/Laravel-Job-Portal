<x-user-dashboard-body>
    <div class="container">
        <h2>My Resume</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Resume Upload Form -->
        <form action="{{ route('resume.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="mb-3">
                <label>Upload Resume (PDF/DOC)</label>
                <input type="file" name="resume" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <!-- Show Current Resume -->
        @if(auth()->user()->resume)
            <p>Current Resume: <strong>{{ auth()->user()->resume }}</strong></p>
            <a href="{{ route('resume.download') }}" class="btn btn-success">Download Resume</a>
        @else
            <p>No resume uploaded yet.</p>
        @endif
    </div>
</x-user-dashboard-body>