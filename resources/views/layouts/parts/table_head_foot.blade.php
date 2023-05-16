<thead>
        <tr>
            @foreach ($spaces as $name)  
                <th>{{ $name }}</th>
            @endforeach
            <th>Action</th>
            <!-- <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Action</th> -->
        </tr>
    </thead>                                    
    <tfoot>
        <tr>
            @foreach ($spaces as $name)  
                <th>{{ $name }}</th>
            @endforeach
            <th>Action</th>
            <!-- <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th> -->
        </tr>
    </tfoot> 