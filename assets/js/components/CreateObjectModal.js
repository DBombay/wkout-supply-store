import React from 'react'
import {Modal, ModalBody, ModalFooter, Button} from 'reactstrap'

export default class CreateObjectModal extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isOpen: false,
            loading: false,
            saved: false
        }
    }

    componentWillReceiveProps(nextProps) {
        this.setState({
            isOpen: nextProps.isOpen
        })
    }

    render() {
        return (
            <Modal isOpen={this.props.menuOpen} toggle={this.props.toggle}>
                <ModalBody>Yo</ModalBody>
                <ModalFooter>
                    <Button color="primary" onClick={this.props.toggle}>Close</Button>
                </ModalFooter>
            </Modal>
        )
    }
}