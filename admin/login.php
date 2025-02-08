<div class="login">
  <div class="page">
    <div class="containerlogin">
      <div class="left">
        <div class="content">
          <h1>Welcome Back!</h1>
          <p>Please log in to your account</p>
          <form action="login_proses.php" method="post">
            <div class="input-group">
              <input type="text" id="user_name" name="user_name" maxlength="50" required>
              <label for="username">Username</label>
            </div>
            <div class="input-group">
              <input type="password" id="password" name="password" maxlength="100" required>
              <label for="password">Password</label>
            </div>
            <div>
              <button class="button-6" type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
      <div class="right">
        <img src="../image/default/es tebak.png" alt="Login Image">
      </div>
    </div>
  </div>
</div>

<style>
  :root {
    --bg: #025464;
    --color: #F8F1F1;
    --tr1: #E57C23;
    --tr2: #E8AA42;
  }

  input {
    color: var(--bg);
    background-color: white;
    border: 1px solid var(--tr1);
    padding: 5px;
    font-size: 16px;
  }

  input::placeholder {
    color: var(--bg);
    opacity: 1;
  }

  .login {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-sizing: border-box;
    color: var(--bg);
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  .page {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .containerlogin {
    display: flex;
    width: 900px;
    background-color: var(--bg);
    border-radius: 20rem 20rem;
    box-shadow: 50px 50px rgba(0, 0, 0, 0.1);
  }

  .left {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0 40px 50px;
  }

  .right {
    flex: 1;
    overflow: hidden;
  }

  .right img {
    width: 20rem;
    height: auto;
    object-fit: cover;
  }

  .content {
    max-width: 300px;
    text-align: center;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  .input-group {
    position: relative;
    margin-bottom: 20px;
  }

  .input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid var(--color);
    font-size: 16px;
  }

  .input-group label {
    position: absolute;
    left: 10px;
    top: 10px;
    padding: 0 5px;
    background: var(--color);
    transition: 0.3s;
    color: var(--bg);
  }

  .input-group input:focus+label,
  .input-group input:valid+label {
    top: -10px;
    left: 10px;
    color: var(--tr1);
    font-size: 12px;
  }

  .actions {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  button {
    background-color: var(--color);
    border-radius: 50px;
    color: var(--bg);
    border: 2px solid var(--tr1);
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 1.2rem;
    font-weight: bold;
  }
</style>