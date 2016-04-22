using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.User
{
    public class Profile
    {
        public Guid ProfileId { get; set; }
        public string Name { get; set; }
        public string Surname { get; set; }
        public string Email { get; set; }
        public bool Newletter { get; set; }
        public Guid AddressId { get; set; }
    }
}
