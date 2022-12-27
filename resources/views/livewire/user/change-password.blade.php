<form wire:submit.prevent="save">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-3">
        <div class="col-md-4 form-group">
            <label class="form-label" for="currentPassword">Current Password *</label>
            <div class="input-group">
                <input wire:model.lazy="current_password" type="password" name="current_password" class="form-control"
                    id="currentPassword" placeholder="Current Password *" required>
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label class="form-label" for="newPassword">New Password *</label>
            <div class="input-group">
                <input wire:model.lazy="new_password" type="password" name="new_password" class="form-control"
                    id="newPassword" placeholder="New Password *" required>
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label class="form-label" for="confirmNewPassword">Confirm New Password *</label>
            <div class="input-group">
                <input wire:model.lazy="password_confirmation" type="password" name="password_confirmation"
                    class="form-control" id="confirmNewPassword" placeholder="Confirm New Password *" required>
            </div>
        </div>

        <div class="col-12 d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-dark">Save Changes</button>

            @if(session('success'))
            <span>{{session('success')}}</span>
            @elseif(session('warning'))
            <span>{{session('warning')}}</span>
            @endif
        </div>
    </div>
</form>