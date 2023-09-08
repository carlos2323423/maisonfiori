<thead>
    <tr>
        @foreach ($spacesTotal as $name)  
            <th>{{ $name }}</th>
        @endforeach
        <th style="min-width: 100px;">Acción</th>
    </tr>
</thead>                                    
<tfoot>
    <tr>
        @foreach ($spacesTotal as $name)  
            <th>{{ $name }}</th>
        @endforeach
        <th style="min-width: 100px;">Acción</th>
    </tr>
</tfoot>