class Listener {
  constructor(elementToListen) {
    this.elementToListen = document.getElementById(elementToListen)
    this.event = 'click'
  }

  listen() {
    this.elementToListen.addEventListener(this.event, (e) => this.handler(e))
  }

  handler(e) {
    e.preventDefault()
    console.log("i'm doing nothing, you doing something wrong")
  }
}

class DialogListener extends Listener {
  constructor(elementToListen, dialogToOpen, dialogToClose) {
    super(elementToListen)
    this.dialogToOpen = document.getElementById(dialogToOpen)
    this.dialogToClose = document.getElementById(dialogToClose)
  }

  handler(e) {
    e.preventDefault()
    this.dialogToOpen.showModal()
    this.dialogToClose.close()
  }
}

class FormListener extends Listener {
  constructor(elementToListen, url, method) {
    super(elementToListen)
    this.event = 'submit'
    this.form = this.elementToListen
    this.url = url
    this.method = method
  }
  listen() {
    this.elementToListen.addEventListener(this.event, (e) => this.handler(e))

    document.addEventListener('keydown', (e) => {
      if (e.key == 'Escape') {
        this.form.closest('dialog').close()
      }
    })
  }

  createHeaders() {
    return this.method == 'post'
      ? {
          method: this.method,
          body: new FormData(
            this.form,
            this.form.querySelector('button[type=submit]')
          )
        }
      : {
          method: this.method
        }
  }

  handler(e) {
    fetch(
      `http://localhost:3000/src/vendor/${this.url}`,
      this.createHeaders()
    ).then((data) => this.callbackHandler(data))
  }

  callbackHandler(data) {
    data.json().then((data) => console.log(data))
    this.form.reset()
    location.reload()
  }
}
