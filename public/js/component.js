export class components {
    constructor (img,name,sympol) {
        this.img = img,
        this.name = name,
        this.sympol = sympol
    }
    medswbox() {
      return `<div class="sw-box-md position-relative" data-color="<?php color() ?>">
      <img src="${this.img}" alt="" class="sw-box-img">
      <div class="position-absolute top-0 w-100 h-100 top-0 p-2 d-flex justify-content-between align-items-start sw-box-layer">
          <div class="mini d-flex align-items-center pl-2 pr-2 align-items-center">
              <ion-icon name="analytics-outline"></ion-icon>
              <span class="pl-3">Track</span>
          </div>
          <p class="mb-0 type">${this.sympol}</p>
      </div>
  </div>`
    }
    test() {
        return 'test succ';
    }
}

