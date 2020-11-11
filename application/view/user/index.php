<section>
    <header class="py-4 wetrust">
        <div class="container">
            <div class="d-flex justify-content-start align-items-center mb-3">
                <a class="h1 mr-2" href="<?= Config::get('URL'); ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
                <h1 class="mb-0">Mi cuenta</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                        <?php if (Config::get('USE_GRAVATAR')) { ?>
                            <img class="rounded-circle" src='<?= $this->user_gravatar_image_url; ?>' />
                        <?php } else { ?>
                            <img class="rounded-circle" src='<?= $this->user_avatar_file; ?>' />
                        <?php } ?>
                        <p class="mb-0 ml-md-5 mt-3 mt-md-0 text-center text-md-left"><?= $this->user_name; ?><br><small><?= $this->user_email; ?></small></p>
                        <p class="d-none d-md-block border-left mx-md-5">&nbsp;<br>&nbsp;<br>&nbsp;</p>
                        <p class="mb-0 mt-3 mt-md-0">Tipo de cuenta:<br><?= $this->user_account_type; ?></small></p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <?php $this->renderFeedbackMessages(); ?>
                </div>
            </div>
        </div>
    </header>
    <main class="minimo d-flex align-items-center justify-content-center">
        <div class="d-flex flex-column flex-md-row  align-items-center">
            <div class="d-flex flex-column justify-content-center my-3 my-md-0">
                <a href="user/editAvatar" class="btn btn-outline-danger btn-large p-lg-3 m-lg-3 shadow-lg"><svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-person-bounding-box" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/><path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></a>
                <a href="user/editAvatar" class="text-dark text-decoration-none text-center">
                    Modificar<br>avatar
                </a>
            </div>
            <div class="d-flex flex-column justify-content-center mb-3 mb-md-0">
                <a href="user/editusername" class="btn btn-outline-danger btn-large p-lg-3 m-lg-3 shadow-lg"><svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-emoji-wink" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/><path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5z"/><path fill-rule="evenodd" d="M8.757 6.063a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z"/></svg></a>
                <a href="user/editusername" class="text-dark text-decoration-none text-center">
                    Modificar<br>nombre
                </a>
            </div>
            <div class="d-flex flex-column justify-content-center mb-3 mb-md-0">
                <a href="user/edituseremail" class="btn btn-outline-danger btn-large p-lg-3 m-lg-3 shadow-lg"><svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/></svg></a>
                <a href="user/edituseremail" class="text-dark text-decoration-none text-center">
                    Modificar<br>correo
                </a>
            </div>
            <div class="d-flex flex-column justify-content-center mb-3 mb-md-0">
                <a href="user/changePassword" class="btn btn-outline-danger btn-large p-lg-3 m-lg-3 shadow-lg"><svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-key" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/><path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
                <a href="user/changePassword" class="text-dark text-decoration-none text-center">
                    Modificar<br>contraseña
                </a>
            </div>
        </div>
    </main>
</section>