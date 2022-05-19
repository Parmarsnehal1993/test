@extends('layouts.app')

@section('content')
<section class="main-content">
    <div class="container">
        <!-- profile section start -->
        <section class="profile-section">
            <form id="profile_image_form" action="{{ route('csv_data_import.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <select name="table_name" class="form-control" required>
                        <option value="">Select Table</option>
                        <option value="User_Appointment">User_Appointment</option>
                        <option value="User_Agent">User_Agent</option>
                        <option value="User_Income_Benefits">User_Income_Benefits</option>
                        <option value="User_Income_Wages">User_Income_Wages</option>
                        <option value="User_Income_Pensions">User_Income_Pensions</option>
                        <option value="UserNames">UserNames</option>
                        <option value="user_outgoing_questions">user_outgoing_questions</option>
                        <option value="Users_Assets">Users_Assets</option>
                        <option value="Users_Checklist">Users_Checklist</option>
                        <option value="Users_Notes">Users_Notes</option>
                        <option value="User_Solution">User_Solution</option>
                        <option value="Signup_Questions">Signup_Questions</option>
                        <option value="add_agent_id_to_usernames_table">add_agent_id_to_usernames_table</option>
                        <option value="update_tel_in_usernames">update_tel_in_usernames</option>
                    </select>
                </div>
                <div class="left">
                    <input type="file" name="file" id="file" required>
                </div>
                <br>
                <br>
                <div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </section>
        <!-- profile section end -->
        
        <!-- commmon error message display section start -->
        @include('layouts.message')
        <!-- commmon error message display section end -->
    </div>
</section>
@endsection
