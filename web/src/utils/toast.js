import { ToastProgrammatic as Toast } from 'buefy'

const ToastUtil = {
  success(message = '') {
    Toast.open({
      duration: 5000,
      message: message,
      type: 'is-success'
    })
  }
}
export default ToastUtil
