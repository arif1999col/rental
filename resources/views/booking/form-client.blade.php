<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">Add new client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('create-client') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="number" class="form-control" required name="nik" value="{{ old('nik') }}">
                        </div>
                        <div class="form-group">
                            <p>Name</p>
                            <input type="text" class="form-control" required name="name" value="{{ old('name') }}" >
                        </div>
                        <div class="form-group">
                            <p>Date of birth</p>
                            <input type="text" class="form-control" required name="dob" value="{{ old('dob') }}" id="datepicker">
                        </div>
                        <div class="form-group">
                            <p>Nomor HP</p>
                            <input type="number" class="form-control" required name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <p>Gender</p>
                            <select name="gender" class="form-control">
                                <option value="male" {{ (old("gender") == 'male' ? "selected":"") }}>male</option>
                                <option value="female" {{ (old("gender") == 'female' ? "selected":"") }}>female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Address</p>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" >
                        </div>
                    </div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</div>