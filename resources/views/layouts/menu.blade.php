<li class="{{ Request::is('specialties*') ? 'active' : '' }}">
    <a href="{{ route('specialties.index') }}"><i class="fa fa-edit"></i><span>Specialties</span></a>
</li>

<li class="{{ Request::is('secures*') ? 'active' : '' }}">
    <a href="{{ route('secures.index') }}"><i class="fa fa-edit"></i><span>Secures</span></a>
</li>

<li class="{{ Request::is('pacientes*') ? 'active' : '' }}">
    <a href="{{ route('pacientes.index') }}"><i class="fa fa-edit"></i><span>Pacientes</span></a>
</li>

<li class="{{ Request::is('schedules*') ? 'active' : '' }}">
    <a href="{{ route('schedules.index') }}"><i class="fa fa-edit"></i><span>Schedules</span></a>
</li>

<li class="{{ Request::is('doctors*') ? 'active' : '' }}">
    <a href="{{ route('doctors.index') }}"><i class="fa fa-edit"></i><span>Doctors</span></a>
</li>

