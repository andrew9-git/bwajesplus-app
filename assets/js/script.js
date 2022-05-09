document.addEventListener('DOMContentLoaded', () => {

  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }

  let bell = document.querySelector(".bx-bell");
  let notification = document.querySelector(".notification");

  bell.addEventListener('click', () => {
    notification.classList.toggle("block");
  });

  const message = document.querySelector("#message");
  const messageModal = document.querySelector("#message-modal");
  const closeMessage = document.querySelector("#message-close");
  
  message.addEventListener('click', (e) => {
    e.preventDefault();
    messageModal.style.display = 'block';
  });
  closeMessage.addEventListener('click', () => {
    messageModal.style.display = 'none';
  });

  const rate = document.querySelector("#rate");
  const rateModal = document.querySelector("#rate-modal");
  const closeRate = document.querySelector("#rate-close");

  rate.addEventListener('click', (e) => {
    e.preventDefault();
    rateModal.style.display = 'block';
  });
  closeRate.addEventListener('click', () => {
    rateModal.style.display = 'none';
  });

  window.addEventListener('click', (e) => {
    if(e.target == messageModal)
    {
      messageModal.style.display = 'none';
    }
    else if(e.target == rateModal)
    {
      rateModal.style.display = 'none';
    }
    else if(e.target != bell && bell.style.display != 'block')
    {
      notification.classList.toggle("block", false);
    }
    else
    {
      return false;
    }
  });

  const arrow = document.querySelectorAll('.arrow');

  for(let i = 0; i < arrow.length; i++)
  {
    arrow[i].addEventListener('click', (e) => {
      const arrowParent = e.target.parentElement.parentElement.parentElement;
      arrowParent.classList.toggle('showMenu');
    });
  }

  //For the anchor tags that have sub-menus
  const noAction = document.querySelectorAll('.no-action');

  for(let i = 0; i < noAction.length; i++)
  {
    noAction[i].addEventListener('click', (e) => {
      e.preventDefault();
    });
  }

  const tooltipBtn = document.querySelectorAll('i.bx.bx-help-circle.tooltip');
  const tooltip = document.querySelectorAll('div.tooltip');

  for(let i = 0; i < tooltipBtn.length; i++)
  {
    tooltipBtn[i].addEventListener('click', () => {
      const showTooltip = tooltipBtn[i].parentElement.parentElement.lastElementChild;
      showTooltip.classList.toggle('show-tooltip');
    });
  }
  
});