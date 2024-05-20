const notification = document.createElement("div");

notification.classList.add("toast-message");

const topicNotification = document.createElement("div");

topicNotification.classList.add("toast-topic");

topicNotification.innerHTML =
  '<i class="fa-solid fa-circle-exclamation" style="color: #fff; font-size: 4rem"></i>';
topicNotification.style.padding = "10px";
topicNotification.style.display = "flex";
topicNotification.style.alignItems = "center";

const contentNotification = document.createElement("div");

contentNotification.classList.add("toast-content");
contentNotification.innerHTML =
  "Thành Công!";

notification.appendChild(topicNotification);
notification.appendChild(contentNotification);

document.body.appendChild(notification);
