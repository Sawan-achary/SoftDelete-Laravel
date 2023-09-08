@include('home')
<div class="wrapper">
    <div class="btn">
        <form action="/" method="POST">
            @csrf
            <button type="submit" class="custom-btn linkbtn">Back</button>
        </form>
    </div>
    <!-- title-section -->
    <div class="title-container">All Deleted Customers</div>
    <!-- table-section -->
    <div class="table-container">
        <table>
            <!-- thead -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- tbody -->
            <tbody>
                @foreach ($deleteddata as $c)
                    <tr>
                        <td>{{ $c['id'] }}</td>
                        <td>{{ $c['name'] }}</td>
                        <td>{{ $c['email'] }}</td>
                        <td>{{ $c['age'] }}</td>
                        <td>{{ $c['phone'] }}</td>
                        <td>{{ $c['address'] }}</td>
                        <td class="flex">
                            <form action="/restore/{{ $c['id'] }}" method="POST">
                                @csrf
                                <button type="button" class="custom-dltbtn dltbtn"
                                    onclick="confirmRestore('{{ $c->id }}')">Restore</button>
                            </form>
                            <form action="/permanentDelete/{{ $c['id'] }}" method="POST">
                                @csrf
                                <button type="button" class="custom-dltbtn dltbtn"
                                    onclick="confirmDelete('{{ $c->id }}')">Delete</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
</body>

</html>
<script>
    function confirmRestore(id) {
        var confirmation = window.confirm('Are you sure you want to Restore this item?');    
        if (confirmation) {
            document.querySelector(`form[action='/restore/${id}']`).submit();
        }
    }
    function confirmDelete(id) {
        var confirmation = window.confirm('Are you sure you want to permanent Delete this item?');    
        if (confirmation) {
            document.querySelector(`form[action='/permanentDelete/${id}']`).submit();
        }
    }
</script>

<style>
    .btn {
        width: 752px;
        display: flex;
        justify-content: end;
    }
    .flex{
        display: flex;
    }
    .flex button{
        margin:2px;
    }

    .custom-btn {
        width: 120px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
            7px 7px 20px 0px rgba(0, 0, 0, .1),
            4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
    }

    .linkbtn {
        background: rgb(255, 151, 0);
        border: none;
        z-index: 1;
    }

    .linkbtn:after {
        position: absolute;
        content: "";
        width: 100%;
        height: 0;
        top: 0;
        left: 0;
        z-index: -1;
        border-radius: 5px;
        background-color: #eaf818;
        background-image: linear-gradient(315deg, #eaf818 0%, #f6fc9c 74%);
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5);
        7px 7px 20px 0px rgba(0, 0, 0, .1),
        4px 4px 5px 0px rgba(0, 0, 0, .1);
        transition: all 0.3s ease;
    }

    .linkbtn:hover {
        color: #000;
    }

    .linkbtn:hover:after {
        top: auto;
        bottom: 0;
        height: 100%;
    }

    .linkbtn:active {
        top: 2px;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* title */
    .title-container {
        height: 40px;
        border-radius: 8px;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        color: #606060;
        font-weight: 400;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
    }

    /* table */
    .table-container {
        /* border: 1px solid #e8e7e7; */
        border-radius: 11px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        width: 752px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    /* table-border */
    tbody tr:not(:last-child) {
        border-bottom: 1px solid #e8e7e7;
    }

    tbody tr td:not(:last-child) {
        border-left: 1px solid #e8e7e7;
    }

    /* table-radious */
    table tr:first-child th:first-child {
        border-top-right-radius: 10px;
    }

    table tr:first-child th:last-child {
        border-top-left-radius: 8px;
    }

    table tr:last-child td:first-child {
        border-bottom-right-radius: 8px;
    }

    table tr:last-child td:last-child {
        border-bottom-left-radius: 8px;
    }

    /* style tr, td, th */
    tr th {
        font-size: 14px;
        font-weight: 500;
        color: #fff;
        background-color: #0066ff;
    }

    tr td {
        color: #606060;
        font-size: 14px;
        font-weight: 400;
    }

    th,
    td {
        padding: 16px;
        text-align: center;
    }

    /* even and odd color */
    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f8f8f8;
    }

    .dltbtn {
        background: rgb(202, 46, 22);
        background: linear-gradient(0deg, rgb(44, 44, 191) 0%, rgba(12, 25, 180, 1) 100%);
        border: none;
    }

    .dltbtn:hover {
        background: rgb(0, 3, 255);
        background: linear-gradient(0deg, rgb(202, 46, 22) 0%, rgb(202, 46, 22) 100%);
    }

    .custom-dltbtn {
        width: 80px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 15px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        /* background: transparent; */
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
            7px 7px 20px 0px rgba(0, 0, 0, .1),
            4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
    }
</style>
