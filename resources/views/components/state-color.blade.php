
<x-shared.modal />
<x-shared.confirm />
<div class="ui top attached" id="content">
    <a id="btnStateAdd" class="ui huge top attached label btnModalOpen" href="{{ route('settings.createColor') }}">
        <i style="float: right;" data-content="Copy code" class="plus icon"></i>
    </a>
    <table id="dtColor" class="ui celled table display" style="width:100%">
        <thead>
            <tr></tr>
                <th>id</th>
                <th>Name</th>
                <th>Description</th>
                <th>İşlem</th>
            </tr>
        </thead>
    </table>
</div>
