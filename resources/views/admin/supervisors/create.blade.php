@extends('layouts.dashboard')
@section('styles')

@endsection

@section('content')
<h5>Personal Information</h5>
<div id="message_div"></div>
<form id="supervisor_form">
    <section>
        <div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" class="form-control" required id="firstname" name="firstname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name :</label>
                        <input type="text" class="form-control" required id="lastname" name="lastname">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Supervisor Phone Number:</label>
                        <input type="text" class="form-control" required id="phone_number" name="phone_number">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Department :</label>
                        <select class="custom-select form-control" required id="department">
                            <option value="" disabled>Select Department</option>
                            <option value="MECHANICAL_AUTOMOTIVE">MECHANICAL / AUTOMOTIVE</option>
                            <option value="BULDING_AND_CONSTRUCTION">BULDING AND CONSTRUCTION</option>
                            <option value="ELECTRICAL_ENGINEERING">ELECTRICAL ENGINEERING</option>
                            <option value="HOSPITALITY_AND_DIATETICS">HOSPITALITY AND DIATETICS</option>
                            <option value="BUSINESS_STUDIES">BUSINESS STUDIES</option>
                            <option value="APPLIED_AND_ENVIRONMENTAL_SCIENCE">APPLIED AND ENVIRONMENTAL SCIENCE</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date of Birth :</label>
                        <input type="date" required class="form-control" placeholder="Select Date" id="dob" name="dob">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Select you class:</label>
                        <select class="custom-select form-control" id="class" required>
                            <option value="" disabled>-- Class --</option>
                            <option value="CEE_M19">CEE M19</option>
                            <option value="ADH_S21">ADH S21</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Supervisor Alternative Phone Number :</label>
                        <input type="text" class="form-control" data-required id="alt_phone" name="alt_phone" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>National ID Number:</label>
                        <input type="text" class="form-control" maxlength="12" data-required id="id_number" name="id_number" required>
                    </div>
                </div>
            </div>

        </div>
    </section>
</form>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-sm btn-success float-right" id="submit">
            Submit
        </button>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/supervisor.js"></script>
@endsection