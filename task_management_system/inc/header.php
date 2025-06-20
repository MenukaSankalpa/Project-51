<header class="header">
    <h2 class="u-name">Task <b>Pro</b>
        <label for="checkbox">
            <i id="navbtn" class="ri-menu-line"></i>
        </label>
    </h2>
    <span class="notification" id="notificationBtn">
        <i class="ri-user-fill"></i>
        <span class="badge">&nbsp;7&nbsp;</span>
    </span>
</header>
<div class="notification-bar" id="notificationBar">
    <ul>
        <li>
            <a href="">
                <mark>New Task Assigned:</mark> 'Customer Feedback Survey Analysis' has been assigned to you. Please review 
                and start working on it
                &nbsp;&nbsp;<small>Sep 2, 2024</small>
            </a>
        </li>
        <li>
            <a href="">
                <mark>New Task Assigned:</mark> 'Customer Feedback Survey Analysis' has been assigned to you. Please review 
                and start working on it
                &nbsp;&nbsp;<small>Sep 2, 2024</small>
            </a>
        </li>
        <li>
            <a href="">
                <mark>New Task Assigned:</mark> 'Customer Feedback Survey Analysis' has been assigned to you. Please review 
                and start working on it
                &nbsp;&nbsp;<small>Sep 2, 2024</small>
            </a>
        </li>
    </ul>
</div>
<script type="text/javascript">
    var openNotification = false;

    const notification = ()=> {
        let notificationBar = document.querySelector("#notificationBar");
        if (openNotification) {
            notificationBar.classList.remove('open-notification');
            openNotification = false;
        }else {
            notificationBar.classList.add('open-notification');
            openNotification = true;
        }
    }
    let notificationBtn = document.querySelector("#notificationBtn");
    notificationBtn.addEventListener("click", notification);
</script>