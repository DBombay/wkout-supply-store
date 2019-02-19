import React from 'react'
import {Modal} from 'reactstrap'

export default class CreateObjectModal extends React.Component {
    constructor(props) {
        super(props);
        this.state={
            loading: false,
            saved: false
        }
    }

    render() {
        return(
            <Modal isOpen={this.props.isOpen} backdrop={this.props.backdrop}>
                Yo
            </Modal>
        )
    }
}