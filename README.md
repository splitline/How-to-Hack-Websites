# How to Hack Websites

## Videos

- 初章：https://youtu.be/a5vrGYsKc_A
- 續章：https://youtu.be/hWC-Evt-sBc
- 終章：https://youtu.be/73uI7BK8k3g

## Topics

### 初章

[Full slide](slides/week/week1.pdf)

- Web & Web security introduction [slide](slides/topic/Web%20Basic.pdf)
- Access control & Bussiness logic 
- Recon & Information leak [slide](slides/topic/Recon%20&%20Info%20leak.pdf)
- Insecure Upload / Path traversal / LFI [slide](slides/topic/Upload%20&%20LFI.pdf)
- Basic injection [slide](slides/topic/Basic%20Injection%20(Code,%20Command,%20SQL).pdf)
  - Code injection
  - Command injection
  - SQL injection: Basic


### 續章

[Full slide](slides/week/week2.pdf)

- SQL injection: Advanced
  - Union-based
  - Boolean-based
  - Other
- Server-side request forgery (SSRF)
- Insecure deserialization
  - Intro
  - Pickle

### 終章

[Full slide](slides/week/week3.pdf)

- Insecure deserialization [slide](slides/topic/Deserialization.pdf)
  - PHP
  - POP Chain
  - Misc (Java, .NET etc.)
- Frontend security: Basic [slide](slides/topic/Fronted%20Security%20Basic%20(XSS,%20CSRF%20etc.).pdf)
  - Same-origin policy
  - CSRF
  - XSS
- Frontend security: Content Security Policy (CSP) [slide](slides/topic/Frontend%20Security%20Content%20Security%20Policy.pdf)
- Frontend security: Advanced 
  - XS-Leak / CSS injection [slide](slides/topic/Frontend%20Security%20Side%20Channel.pdf)
  - DOM Clobbering [slide](slides/topic/Frontend%20Security%20DOM%20Clobbering.pdf)
- Advanced injection
  - NoSQL injection
  - Server-side template injection (SSTI)
- Misc
  - JavaScript prototype pollution [slide](slides/topic/JavaScript%20Prototype%20Pollution.pdf)
  - XXE


## Labs

> 題目之後的 `數字` 代表的是 docker 對外通訊埠編號

- [Basic](lab/logic-vulns/)
  - [x] Cat Shop `8100`
- SQL injection
  - [x] Login me: Login bypass `8200`
  - [x] Login me again: UNION-based SQL injection `8201`
- [Command injection](lab/cmd-injection/)
  - [x] DNS tool `8300`
  - [x] DNS tool: WAF edition `8301`
- [LFI](lab/lfi/)
  - [x] Meow site: Basic LFI `8400`
  - [x] HakkaMD: LFI to RCE `8401`
- [SSRF](lab/ssrf/)
  - [x] Web Preview Service: Use `gopher://` to forge a request `8500`
  - [x] SSRFrog: Bypass blacklist `8501`
- [Deserialization](lab/deserialization/)
  - [x] Pickle `8600`
  - [x] Cat: Basic PHP unserialize `8601`
  - [x] Magic cat: POP chain `8602`
- [SSTI](lab/ssti/)
  - [x] Jinja2 SSTI `8700`
- [Frontend](lab/frontend/)
  - [x] XSS `8800`

## Homework

- Imgura: Information Leak / Upload / LFI
- DVD Screensaver: Path traversal / SQL injection / Signed Cookie
- Profile Card: XSS / CSRF / CSP Bypass
- Double SSTI: SSTI
- Log me in: FINAL: SQL injection / Information Leak


