<script>                             
    function getidsarray(names) {
        // console.log(names);
        var ids = [];
        for (const value of names) {
            const elementId = `MODAL_id_${value}`;
            ids.push(elementId);
            // ids[elementId] = value;
            // ids.push([elementId, value]);
        }
        console.log(ids);
        // return Object.entries(ids);
        return ids;
    }        
</script>        