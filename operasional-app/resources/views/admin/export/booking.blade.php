<table>
    <thead>
        <tr>
            <th>NO </th>
            <th>VEHICLE</th>
            <th>VEHICLE TYPE</th>
            <th>OWNERSHIP</th>
            <th>DRIVER</th>
            <th>START DATE</th>
            <th>END DATE</th>
            <th>STATUS</th>
            <th>APPROVED BY</th>
            @if (auth()->guard('web-admin-center')->user())
            <th>LOCATION</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @php
        $i=0;
        @endphp
        @foreach($booking as $b)
        @php
        $i++;
        @endphp
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $b->vehicle->vehicle_name }}</td>
            <td>{{ $b->vehicle->vehicle_type }}</td>
            <td>{{ $b->vehicle->company_id == 1 ? 'company vehicle' : 'rent' }}</td>
            <td>{{ $b->driver->driver_name }}</td>
            <td>{{ $b->start_usage_date }}</td>
            <td>{{ $b->end_usage_date }}</td>
            <td>{{ $b->status }}</td>
            <td>{{$b->status==='pending'?'-': $b->approved->admin_center_name }}</td>
            @if (auth()->guard('web-admin-center')->user())
            <td>{{ $b->vehicle->mine->location }}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
