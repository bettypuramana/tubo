@extends('layouts.admin.admin_layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .pl{
        margin-right: 30px;
    }
</style>

@section('title', 'Clients')

@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Project - {{ $client->title }}</h4>
                <form id="projectForm" class="forms-sample" method="POST" action="{{ route('client.projects.store', $client->id) }}">
                @csrf
                <input type="hidden" name="project_id" id="project_id" value="">
                <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-form-label">Project Name</label>
                            <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Enter Project Name">
                            @error('project_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Contractor</label>
                            <input type="text" class="form-control" id="contractor" name="contractor" placeholder="Enter Contractor Name">
                            @error('contractor')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" id="submit_button" class="btn btn-primary mr-2">Save</button>
                    <a href="{{ route('clients-list') }}" class="btn btn-light">Back</a>
                    <div id="message-container"></div>
                </form>
            </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card mt-3">
            <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success mb-1 mt-1" id="flash-message">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('fail'))
                    <div class="alert alert-danger mb-1 mt-1" id="flash-message">
                        {{ session('fail') }}
                    </div>
                @endif

                <h4 class="card-title">Project List</h4>
                <div class="table-responsive">
                <table id="contactTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Contractor</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (!empty($projects))
                        @foreach($projects as $project)
                            <tr id="project-row-{{ $project->id }}">
                                <td class="project-name">{{ $project->project_name }}</td>
                                <td class="contractor">{{ $project->contractor }}</td>
                                <td>
                                    <a href="javascript:void(0);" onclick="editProject({{ $project->id }})" class="mr-2" data-toggle="tooltip" title="Edit"> 
                                        <i class="fa fa-pencil color-muted text-warning"></i> 
                                    </a> 
                                    <form method="POST" action="{{ route('client.projects.delete', $project->id) }}" style="display:inline;"> 
                                        @csrf 
                                        @method('DELETE') 
                                        <button type="submit" style="border: none; background: transparent; padding: 0;" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this project?')"> 
                                            <i class="fa fa-trash color-danger text-danger"></i> 
                                        </button> 
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>

    </div>    
   
</div>
@endsection

@section('js')
<script>
    const deleteProjectUrl = "{{ route('client.projects.delete', ['id' => ':id']) }}";
</script>
<script>
    window.onload = function() {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.transition = 'opacity 0.5s ease';
                flashMessage.style.opacity = '0';
                setTimeout(() => {
                    flashMessage.remove();
                }, 500);
            }, 3000); // 3 seconds
        }
    }
</script>
<script>
    function editProject(id) {
        fetch(`/client/project/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('project_id').value = data.id;
                document.getElementById('project_name').value = data.project_name;
                document.getElementById('contractor').value = data.contractor;
                document.getElementById('submit_button').textContent = 'Update';
            });
    }
    
    // Handle form submission via AJAX
    document.getElementById('projectForm').addEventListener('submit', function(e) {
        e.preventDefault(); // prevent default form submit

        const form = this;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                // Handle validation errors or server errors here
                return response.json().then(errData => {
                    // Example: show validation errors (basic)
                    alert(Object.values(errData.errors).flat().join("\n"));
                    throw new Error('Validation error');
                });
            }
            return response.json();
        })
        .then(data => {
            // Clear form
            form.reset();
            document.getElementById('project_id').value = '';
            document.getElementById('submit_button').textContent = 'Save';

            const tbody = document.querySelector('#contactTable tbody');

            // Check if project already exists in the table (update case)
            let existingRow = document.querySelector(`#project-row-${data.id}`);

            if (existingRow) {
                // Update existing row
                existingRow.querySelector('.project-name').textContent = data.project_name;
                existingRow.querySelector('.contractor').textContent = data.contractor;
            } else {
                // Remove "No projects found." row if it exists
                const noDataRow = tbody.querySelector('tr td[colspan="3"]');
                if (noDataRow) {
                    noDataRow.parentElement.remove();
                }

                // Append new row
                const newRow = document.createElement('tr');
                newRow.id = `project-row-${data.id}`;
                newRow.innerHTML = `
                    <td class="project-name">${data.project_name}</td>
                    <td class="contractor">${data.contractor}</td>
                    <td>
                        <a href="javascript:void(0);" onclick="editProject(${data.id})" class="mr-2" data-toggle="tooltip" title="Edit"> 
                            <i class="fa fa-pencil color-muted text-warning"></i> 
                        </a> 
                        <form method="POST" action="${deleteProjectUrl.replace(':id', data.id)}" style="display:inline;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="border:none; background:transparent; padding:0;" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this project?')">
                                <i class="fa fa-trash color-danger text-danger"></i>
                            </button>
                        </form>
                    </td>
                `;
                tbody.appendChild(newRow);
                updateEntryCount();
            }

            // Show success message dynamically
            const messageContainer = document.getElementById('message-container');
            messageContainer.innerHTML = `
                <div class="alert alert-success mb-1 mt-1">
                    ${data.message || 'Project saved successfully.'}
                </div>
            `;

            // Remove the message after 3 seconds
            setTimeout(() => {
                messageContainer.innerHTML = '';
            }, 3000);
        })
        .catch(err => {
            console.error(err);
        });
    });

    function updateEntryCount() {
        const totalEntries = document.querySelectorAll('#contactTable tbody tr').length;
        const infoElement = document.querySelector('#contactTable_info');

        if (infoElement) {
            infoElement.textContent = `Showing 1 to ${totalEntries} of ${totalEntries} entries`;
        }
    }

</script>
@endsection
