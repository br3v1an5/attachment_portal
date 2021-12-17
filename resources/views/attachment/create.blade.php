@extends('layouts.dashboard')

@section('content')
<div class="wizard-content">
    <form class="tab-wizard wizard-circle">
        <h5>Personal Information</h5>
        <section>
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Your Phone Number:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number">
                            @csrf
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Department :</label>
                            <select class="custom-select form-control" id="department">
                                <option disabled value="">--Select --</option>
                                <option value="Amsterdam">MECHANICAL / AUTOMOTIVE</option>
                                <option value="Berlin">BULDING AND CONSTRUCTION</option>
                                <option value="Frankfurt">ELECTRICAL ENGINEERING</option>
                                <option value="Amsterdam">HOSPITALITY AND DIATETICS</option>
                                <option value="Berlin">BUSINESS STUDIES</option>
                                <option value="Frankfurt">APPLIED AND ENVIRONMENTAL SCIENCE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth :</label>
                            <input type="text" class="form-control date-picker" placeholder="Select Date" id="dob" name="dob">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select you class:</label>
                            <select class="custom-select form-control" id="class">
                                <option value="" disabled>-Select Class-</option>
                                <option value="Amsterdam">CEE M19</option>
                                <option value="Berlin">ADH S21</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alternative Phone Number :</label>
                            <input type="text" class="form-control" id="alt_phone" name="alt_phone" required>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h5>Organization</h5>
        <section>
            <div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Attached Department :</label>
                            <input type="text" class="form-control" id="attached_dep" name="attached_dep">
                        </div>
                        <div class="form-group">
                            <label>Supervisor contact :</label>
                            <input type="text" class="form-control" id="supervisor_no" name="supervisor_no">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Organization's Email Address :</label>
                            <input type="text" class="form-control" id="org_email" name="org_email">
                        </div>
                        <div class="form-group">
                            <label>Organization Contact :</label>
                            <input type="text" class="form-control" id="org_no" name="org_no">
                        </div>
                        <div class="form-group">
                            <label>Town of Organization</label>
                            <input type="text" class="form-control" id="town" name="town">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Insuarance :</label>
                            <select class="custom-select form-control" id="insurance">
                                <option value="" disabled>-Select Insurance-</option>
                                <option value="insured">Insured</option>
                                <option value="Not Insured">Not Insured</option>
                                <option value="IDK">I Dont Know</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name of the Organization :</label>
                            <input type="text" class="form-control" id="org_name" name="org_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Starting date :</label>
                            <input type="text" class="form-control date-picker" placeholder="Select starting Date" id="start_date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Completion date :</label>
                            <input class="form-control date-picker" placeholder="Select complition date " type="text" id="completion_date" name="completion_date">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h5>Location</h5>
        <section>
            <div>
                <h5>Kindly drag the map marker to your attachment location </h5>
                <div class="row">
                    <div class="col-md-12" id="map">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lat :</label>
                            <input type="text" id="lat" readonly="yes" class="form-control" name="latitude">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Long:</label>
                            <input type="text" id="lng" readonly="yes" class="form-control" name="longitude">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h5>Remarks</h5>
        <section>
            <div>
                <h5>Remark</h5>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" id="remark" name="remark"></textarea>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </form>
</div>
@endsection

@section('scripts')
<script src="/assets/vendors/scripts/steps-setting.js"></script>
<script src="/assets/js/gmap.js"></script>
@endsection