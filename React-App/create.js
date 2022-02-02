import React, { useState } from 'react';
import { Button, Checkbox } from 'semantic-ui-react';
import axios from 'axios';


export default function Create() {
    const [firstName, setFirstName] = useState('');
    const [lastName, setLastName] = useState('');
    const [checkbox, setCheckbox] = useState(false);
    

    const postData = () => {
        axios.post(`https://61f0bb51e386270017fe1e53.mockapi.io/formData`, {
            firstName,
            lastName,
            checkbox
        })
}
    return (
        <div>
            <form className="create-form">
            
                    <label>First Name</label>
                    <input placeholder='First Name' onChange={(e) => setFirstName(e.target.value)}/>
                
            
                    <label>Last Name</label>
                    <input placeholder='Last Name' onChange={(e) => setLastName(e.target.value)}/>
                
            
                    <Checkbox label='I agree to the Terms and Conditions' onChange={(e) => setCheckbox(!checkbox)}/>
                
                <Button onClick={postData} type='submit'>Submit</Button>
            </form>
        </div>
    )
}