 
<div class="containerResultsLesson" style="display:none">
                <div class="modal-content content ">
                    <div class="modal-header">
                        <div class="text-center w-100">
                            <h2 class="modal-title purpleModalTitle fs-5" id="exampleModalLabel"><b>
                                    ¡Has completado la lección! </b>
                            </h2>
                            <p class="m-0 messageResult"> ¡De manera existosa!
                            </p>
                            <img src="<?php $_SESSION["gender"] == "1" ?
                                $gender = '../../../../../img/childs/boy.png' : $gender = '../../../../../img/childs/girl.png';
                            echo $gender ?>
                                " class="img-fluid userImgLesson" alt="">
                            <div>
                                <div class="flexComun gap-3">
                                    <div class="gemsResult">
                                        <div>
                                            <span class="fs-3"></span>
                                        </div>
                                        <i class="bi bi-gem fs-2"></i>
                                    </div>
                                    <div class="timeResult">
                                        <div>
                                            <span class="fs-3"></span>
                                        </div>
                                        <i class="bi-stopwatch-fill fs-2"></i>
                                    </div>
                                    <div class="porcentageResult">
                                        <div>
                                            <span class="fs-3"></span>
                                        </div>
                                        <i class="bi-bar-chart fs-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center gap-4 align-items-center m-0">

                        <div class="flexG">
                            <a href="" class="buttonPlayAgain ">Jugar de nuevo</a>
                            <a href="../../read.php" class="buttonExit ">Salir</a>
                        </div>

                    </div>

                </div>
            </div>