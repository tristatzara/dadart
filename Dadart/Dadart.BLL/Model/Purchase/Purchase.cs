using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClassLibrary1.Model.Purchase
{
    class Purchase
    {
        public Guid PurchaseId { get; set; }
        public float Ammount { get; set; }
        public DateTime Date { get; set; }
        public bool Shipped { get; set; }
        public Guid AddressId { get; set; }
    }
}
