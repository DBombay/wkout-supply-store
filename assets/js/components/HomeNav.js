import React from 'react'
import {
    Nav,
    Navbar,
    NavbarBrand,
    NavItem,
    NavbarToggler,
    Collapse,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownItem,
    DropdownMenu
} from 'reactstrap'
import {CreateObjectModal} from "./index";

export default class HomeNav extends React.Component {
    constructor(props) {
        super(props);
        this.toggle = this.toggle.bind(this);
        this.state = {
            menuOpen: false,
            modalOpen: false
        };
    }

    toggle(event) {
        this.setState({[event.target.name]: event.target.value});
    }


    render() {
        return (
            <Navbar color="dark" dark expand="lg">
                <NavbarBrand href="/" className='text-white'>Work In-and-Out</NavbarBrand>
                <NavbarToggler onClick={() => {this.toggle({target: {name: 'menuOpen', value: !this.state.menuOpen}})}}/>
                <Collapse isOpen={this.state.menuOpen} navbar>
                    <Nav className="ml-auto" navbar>
                        <NavItem>
                            <UncontrolledDropdown nav inNavbar>
                                <DropdownToggle nav caret className="text-white">
                                    Create New...
                                </DropdownToggle>
                                <DropdownMenu right>
                                    <DropdownItem onClick={() => {this.toggle({target: {name: 'modalOpen', value: !this.state.modalOpen}})}}>
                                        Category
                                    </DropdownItem>
                                    <DropdownItem>Sub-Category</DropdownItem>
                                    <DropdownItem>Product</DropdownItem>
                                </DropdownMenu>
                            </UncontrolledDropdown>
                        </NavItem>
                    </Nav>
                </Collapse>
                <CreateObjectModal
                    isOpen={this.state.modalOpen}
                    toggle={() => {this.toggle({target: {name: 'modalOpen', value: !this.state.modalOpen}})}}
                />
            </Navbar>
        )
    }
}