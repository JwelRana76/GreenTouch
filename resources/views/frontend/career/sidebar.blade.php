@php
  $cskill = DB::table('user_personal_details')->whereNull('computer_skill')->where('user_id',Auth::user()->id)->first();
@endphp
<ul class="career-sidebar">
  <input type="hidden" value="{{ Auth::guard('web')->user()->id }}" class="user_id">
    <li><a href="{{ route('career.personal_details') }}" class="text-dark">Personal information</a></li>
    @if (Auth::user()->personaldetails)
      <li><a href="{{ route('career.EducationalInfo') }}" class="text-dark">Educational information</a></li>
      @if (Auth::user()->educationinfo)
        @if (Auth::user()->educationinfo->status !== 'pending')
          <li><a href="{{ route('career.EmploymentInfo') }}" class="text-dark">Employment History</a></li>
          @if (Auth::user()->employmentinfo)
            @if (Auth::user()->employmentinfo->status !== 'pending')
              <li><a href="{{ route('career.ComputerSkill') }}" class="text-dark">Career Objective & Computer Skill</a></li>
              @if (!$cskill)
                <li><a href="{{ route('career.Referance') }}" class="text-dark">Referance</a></li>
                @if ( Auth::user()->userreferance)
                  <li><a href="{{ route('career.PhotoSignature') }}" class="text-dark">Photo & Signature</a></li>
                @else
                  <li><a class="deactive">Photo & Signature</a></li>
                @endif
              @else
                <li><a class="deactive">Referance</a></li>
                <li><a class="deactive">Photo & Signature</a></li>
              @endif
            @else
            <li><a class="deactive">Career Objective & Computer Skill</a></li>
            <li><a class="deactive">Referance</a></li>
            <li><a class="deactive">Photo & Signature</a></li>
            @endif
            @else
            <li><a class="deactive">Career Objective & Computer Skill</a></li>
            <li><a class="deactive">Referance</a></li>
            <li><a class="deactive">Photo & Signature</a></li>
          @endif
        @else
        <li><a class="deactive">Employment History</a></li>
        <li><a class="deactive">Career Objective & Computer Skill</a></li>
        <li><a class="deactive">Referance</a></li>
        <li><a class="deactive">Photo & Signature</a></li>
        @endif
      @else
        <li><a class="deactive">Employment History</a></li>
        <li><a class="deactive">Career Objective & Computer Skill</a></li>
        <li><a class="deactive">Referance</a></li>
        <li><a class="deactive">Photo & Signature</a></li>
      @endif
    @else
      <li><a class="deactive">Educational information</a></li>
      <li><a class="deactive">Employment History</a></li>
      <li><a class="deactive">Career Objective & Computer Skill</a></li>
      <li><a class="deactive">Referance</a></li>
      <li><a class="deactive">Photo & Signature</a></li>
    @endif
    
</ul>