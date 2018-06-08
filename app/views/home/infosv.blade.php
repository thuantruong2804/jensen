@section('content')


    <div class="row" style="margin-bottom: 300px;">
        <div class="col-xs-12">
            <?php if(isset($aInformation) && is_array($aInformation)){ ?>


            <center>
                <h2>Thông tin server</h2>
                <h2>
                    <table width="auto">
                        <tr>
                            <td><b>Hostname: </b></td>
                            <td><?php echo htmlentities($aInformation['Hostname']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Gamemode: </b></td>
                            <td><?php echo htmlentities($aInformation['Gamemode']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Đang chơi: </b></td>
                            <td><?php echo $aInformation['Players']; ?> / <?php echo $aInformation['MaxPlayers']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Bản đồ: </b></td>
                            <td><?php echo htmlentities($aInformation['Map']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Thời tiết: </b></td>
                            <td><?php echo $aServerRules['weather']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Thời gian: </b></td>
                            <td><?php echo $aServerRules['worldtime']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Phiên bản: </b></td>
                            <td><?php echo $aServerRules['version']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Password: </b></td>
                            <td><?php echo $aInformation['Password'] ? 'Yes' : 'No'; ?></td>
                        </tr>
                    </table>


                </h2>
            </center>

            <center>


                <h2>Thành viên đang trực tuyến</h2>


                <?php
                if(!is_array($aTotalPlayers) || count($aTotalPlayers) == 0){
                    echo '<br /><i style="color: #fff">Không có</i>';
                } else {
                ?>

                <h2>
                    <table width="1000">
                        <tr>
                            <td><span style="color: red;">STT</span></td>
                            <td><span style="color: red;">Tài khoản</span></td>
                            <td><span style="color: red;">Level</span></td>
                            <td><span style="color: red;">Ping</span></td>
                        </tr></h1>


                        <?php foreach($aTotalPlayers AS $id => $value){ ?>
                        <tr>
                            <td>»<?php echo $value['PlayerID']; ?></td>
                            <td><?php echo htmlentities($value['Nickname']); ?></td>
                            <td><img src="img/level/<?php echo $value['Score']; ?>.png"> </td>
                            <td><?php echo $value['Ping']; ?></td>
                        </tr>
                    <?php }

                    echo '</table>';
                    }
                    } else {
                        echo '<h2 style="text-align: center;">Server is offline</h2>';
                    }
                    ?>
                </h2>
        </div>
    </div>
    <style>
        td, h2 {
            color: #fff;
        }
    </style>
@stop

@section('scripts')
@stop