using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;
using Dadart.BLL.Model.User;

namespace Dadart.BLL.Manager
{
    public class ProfileManager : DefaultManager
    {
        public string GetPasswordSalt(string username)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/users/user/" + username).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsStringAsync().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public string GetUserId(string username, string password)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/users/user/" + username + "/" + password).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsStringAsync().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public Profile GetProfile(string userId)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/users/profile/" + userId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<Profile>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public void PostUser(User user)
        {
            try
            {
                var response = Client.PostAsJsonAsync("WebService.php/api/users/newUser", user).Result;
                if (!response.IsSuccessStatusCode)
                    throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public void PostProfile(Profile profile)
        {
            try
            {
                var response = Client.PostAsJsonAsync("WebService.php/api/users/newProfile", profile).Result;
                if (!response.IsSuccessStatusCode)
                    throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public void PostAddress(Address address)
        {
            try
            {
                var response = Client.PostAsJsonAsync("WebService.php/api/address/newAddress", address).Result;
                if (!response.IsSuccessStatusCode)
                    throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }
    }
}
