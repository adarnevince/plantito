<html lang="en">
<head>
    @include('layouts/head')
    <title>Plantito - Contact Us</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
    <link rel="stylesheet" href="css/contact.css" />
</head>
<body>
    @include('layouts/navbar-profile')
    <!-- <div class="container left-line mt-5">
        <h1>Contact Us</h1>
    </div> -->
    <div class="contact contact-main">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          
          <div class="topic">Address</div>
          <div class="text-one">Walasa, Mundo</div>
          <div class="text-two">Asgard 06</div>
        </div>
        <div class="phone details">
          
          <div class="topic">Phone</div>
          <div class="text-one">+639 1234 45678</div>
          <div class="text-two">+639 8765 43210 </div>
        </div>
        <div class="email details">
          
          <div class="topic">Email</div>
          <div class="text-one">plantito@gmail.com</div>
          <div class="text-two">buddy@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have questions, concerns or feedback, you can send me a message here. It's my pleasure to help you!</p>
      <form>
        <div class="input-box">
          <input type="text" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email" required>
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your message here!" required></textarea>
        </div>
        <div class="button">
          <input type="button" class="btn btn-success" value="Send Now" >
        </div>
      </form>
    </div>
    </div>
  </div>
  @include('layouts/footer')
</body>

</html>