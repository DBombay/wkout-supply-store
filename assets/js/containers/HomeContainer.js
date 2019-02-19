import React from 'react'
import {CategoriesCollection, CreateObjectModal, Hero} from "../components"

export default class HomeContainer extends React.Component {
    constructor(props) {
        super(props);
        this.toggle = this.toggle.bind(this);
        this.state={
            backdrop: false,
            modalOpen: false
        }
    }

    toggle() {
        this.setState(prevState => ({
            modal: !prevState.modalOpen
        }));
    }

    render() {
        return(
            <div className="container">
                <Hero />
                <CategoriesCollection />
                <CreateObjectModal
                    isOpen={this.state.modalOpen}
                    backdrop={this.state.backdrop}
                />
            </div>
        )
    }
}