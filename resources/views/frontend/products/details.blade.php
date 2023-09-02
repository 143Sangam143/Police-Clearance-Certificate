<div class="pt-[5rem]"></div>
<div class="form-container">
    <form action="#" class="form">
        <h1 class="text-center">Registration form</h1>
        <!-- progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div class="progress-step progress-step-active" data-title="Intro"></div>
            <div class="progress-step" data-title="Contact"></div>
            <div class="progress-step" data-title="ID"></div>
            <div class="progress-step" data-title="Password"></div>
        </div>
        <!-- steps -->
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="input-group">
                <label for="position">Position</label>
                <input type="text" name="position" id="position">
            </div>
            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="phone">phone</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div class="input-group">
                <label for="email">email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Prev</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="dob">dob</label>
                <input type="date" name="dob" id="dob">
            </div>
            <div class="input-group">
                <label for="ID">ID</label>
                <input type="number" name="ID" id="ID">
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Prev</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="input-group">
                <label for="confirmPassword">confirmPassword</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Prev</a>
                <input type="submit" value="submit" class="btn"></input>
            </div>
        </div>
    </form>
</div>
<div class="pb-[5rem]"></div>

<style>
    :root{
        --primary-color: rgba(11, 78, 179);
    }
    .text-center{
        text-align: center;
    }

    .progressbar{
        position: relative;
        display: flex;
        justify-content: space-between;
        margin: 2rem 0 4rem;
    }

    .progressbar::before, .progress{
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        counter-reset: step;
        z-index: -1;
    }

    .progress{
        background-color: var(--primary-color);
        width: 0;
        transition: .3s;
    }

    .progress-step{
        width: 2.1875rem;
        height: 2.1875rem;
        background-color: #dcdcdc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .progress-step::before{
        counter-increment: step;
        content:counter(step);
    }

    .progress-step::after{
        content: attr(data-title);
        position: absolute;
        top: calc(100% + .5rem);
        font-size: .85rem;
        color: #666;
    }

    .progress-step-active{
        background-color: var(--primary-color);
        color: #fff;
    }

    .form-container{
        display: grid;
        place-items: center;
        min-height: 100vh;
    }

    .width-50{
        width: 50%;
    }

    .ml-auto{
        margin-left: auto;
    }

    label{
        display: block;
        margin-bottom:0.5rem;
    }

    input{
        display: block;
        width: 100%;
        padding: .75rem;
        border: 1px solid #ccc;
        border-radius: .25rem;
    }

    .form{
        width: clamp(320px, 30%, 430px);
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 0.35rem;
        padding: 1.5rem;;
    }

    .form-step{
        display: none;
    }

    .form-step-active{
        display: block;
    }

    .input-group{
        margin: 2rem 0;
    }

    .btn{
        padding: .75rem;
        display: block;
        text-decoration: none;
        background-color: var(--primary-color);
        color: #fff;
        text-align: center;
        cursor: pointer;
        border-radius: .25rem;
        transition: 0.3s all;
    }

    .btn:hover{
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
    }

    .btns-group{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
</style>

<script>
    const prevBtns = document.querySelectorAll('.btn-prev');
    const nextBtns = document.querySelectorAll('.btn-next');
    const progress = document.getElementById('progress');
    const formSteps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll(".progress-step");
    
    let formStepsNum = 0;
    nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        });
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();
        });
    });

    function updateFormSteps(){
        formSteps.forEach(formStep => {
            formStep.classList.contains("form-step-active");
            formStep.classList.remove("form-step-active");
        });
        formSteps[formStepsNum].classList.add('form-step-active');
    }

    function updateProgressbar(){
        progressSteps.forEach((progressStep, idx) => {
            if(idx < formStepsNum + 1 ){
                progressStep.classList.add("progress-step-active");
            }
            else{
                progressStep.classList.remove("progress-step-active");
            }
        });
        const progressActive = document.querySelectorAll('.progress-step-active');
    
        progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
    }
</script>