<?php
include("../include/ketnoi.php");
include("../include/chucnang.php");

    $sql    = "SELECT * FROM nhac";
    $ketqua = mysqli_query($ketnoi,$sql);

    if(mysqli_num_rows($ketqua) > 0)
	{
		while ($row = mysqli_fetch_assoc($ketqua))
		{
            $tieude     = $row['tieude'];
            $casi       = $row['casi'];
            $file_name  = $row['tenfile'];
                
?>
            <div class=" row no-gutters gian-cach radius-border flex-doc background-change like" style="width: 98%;height: 70px;">
                <div id='<?php echo $file_name ?>' onclick="changeMusic(this.id)" class="col-md-8 col-9 flex-doc">
                    <div class="gian-cach" style="color: rgb(255,255,255,0.8);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-music-note-list" viewBox="0 0 16 16">
                            <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z" />
                            <path fill-rule="evenodd" d="M12 3v10h-1V3h1z" />
                            <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z" />
                            <path fill-rule="evenodd"
                                d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    <div class='gian-cach'
                        style="background-color: rgb(65, 121, 225);width: 50px;height: 50px;border-radius: 10px;">
                    </div>
                    <div class="gian-cach">
                        <span><b><?php echo $tieude; ?></b></span><br>
                        <span><?php echo $casi; ?></span>
                    </div>
                </div>
                <div class="col-md-2 d-none d-md-block">
                    <div>
                        <span><?php music_duration($file_name);?></span>
                    </div>
                </div>
                <div class="col-md-2 col-3">
                    <span class="material-icons-outlined" style="z-index: 1;" onclick="alert('hello')">library_add</span>
                </div>
            </div>
<?php
        }
    }

?>