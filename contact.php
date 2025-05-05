<?php include("header.php")?>
    <div class="about_container">
        <div class="sm_cont_three">
            
            <h1>Get In Touch</h1>
            <p>
                Let's connect! Whether you have a project in mind, a collaboration opportunity, or just want to say <br>
                hello, I'm always happy to chat. Feel free to reach out, and let's create something amazing
                together!
            </p>
            <h2>Contact Form</h2>
            <div class="form_cont">
                
            
            <form action="form.php" method="POST">
                
                    <input type="text"style="color:white;" name="name" placeholder="Name">
                    <input type="text" style="color:white;" name="email"  placeholder="Email">
                    <input type="number" style="color:white;" name="phone"  placeholder="Phone Number">
                <textarea name="message" style="color:white;" placeholder="Enter Your Message"></textarea>
                <button type="submit" name="send">Submit</button>
            </form>
            </div>
        </div>
    </div>

  <?php include("footer.php")?>